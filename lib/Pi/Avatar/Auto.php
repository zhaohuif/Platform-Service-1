<?php
/**
 * Pi Engine (http://pialog.org)
 *
 * @link            http://code.pialog.org for the Pi Engine source repository
 * @copyright       Copyright (c) Pi Engine http://pialog.org
 * @license         http://pialog.org/license.txt New BSD License
 */

namespace Pi\Avatar;

use Pi;

/**
 * Auto avatar handler
 *
 * @author Taiwen Jiang <taiwenjiang@tsinghua.org.cn>
 */
class Auto extends AbstractAvatar
{
    /**
     * {@inheritDoc}
     */
    public function getSource($uid, $size = '')
    {
        $src = '';
        if ($uid) {
            if ($uid == $this->user->get('id')) {
                $data = array(
                    'avatar'    => $this->user->get('avatar'),
                    'email'     => $this->user->get('email'),
                );
            } else {
                $data = Pi::user()->get($uid, array('avatar', 'email'));
            }

            if ($data) {
                $src = $this->buildUrl($data, $size);
            }
        }

        return $src;
    }

    /**
     * {@inheritDoc}
     */
    public function getSourceList($uids, $size = '')
    {
        $result = array();
        $list = Pi::user()->get($uids, array('avatar', 'email'));
        foreach ($list as $uid => $data) {
            if ($data) {
                $url = $this->buildUrl($data, $size);
                if ($url) {
                    $result[$uid] = $url;
                }
            }
        }

        return $result;
    }

    /**
     * {@inheritDoc}
     */
    public function build($source, $size = '', $uid = null)
    {
        return false;
    }

    /**
     * Build avatar URL
     *
     * @param array  $data
     * @param string $size
     *
     * @return string
     */
    protected function buildUrl(array $data, $size)
    {
        $src = '';
        if (!empty($this->options['adapter_allowed'])) {
            $allowedAdapters = (array) $this->options['adapter_allowed'];
        } else {
            $allowedAdapters = (array) Pi::avatar()->getOption('adapter');
        }
        $list = array_fill_keys($allowedAdapters, '');

        if (!$data['avatar']) {
            if (isset($list['gravatar'])) {
                $list['gravatar'] = $data['email'];
            }
        } else {
            $type = Pi::service('avatar')->getType($data['avatar']);
            if (isset($list[$type])) {
                $list[$type] = $data['avatar'];
            }
        }

        foreach ($list as $adapter => $avatar) {
            if ($avatar) {
                $src = Pi::service('avatar')->getAdapter($adapter)
                    ->build($avatar, $size);
                break;
            }
        }

        return $src;
    }
}
