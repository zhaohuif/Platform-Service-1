<?php
/**
 * Pi Engine (http://pialog.org)
 *
 * @link            http://code.pialog.org for the Pi Engine source repository
 * @copyright       Copyright (c) Pi Engine http://pialog.org
 * @license         http://pialog.org/license.txt New BSD License
 * @package         Form
 */

namespace Custom\User\Form\View\Helper;

use Zend\Form\ElementInterface;
//use Zend\Form\Exception;
use Zend\Form\View\Helper\AbstractHelper;
use Pi;

/**
 * Collective checkbox element helper
 *
 * @author Taiwen Jiang <taiwenjiang@tsinghua.org.cn>
 */
class Checkbox extends AbstractHelper
{
    /**
     * Invoke helper as function
     *
     * Proxies to {@link render()}.
     *
     * @param  ElementInterface|null $element
     * @return string|self
     */
    public function __invoke(ElementInterface $element = null)
    {
        if (!$element) {
            return $this;
        }

        return $this->render($element);
    }

    /**
     * {@inheritDoc}
     */
    public function render(ElementInterface $element)
    {
        $this->view->plugin('js')->load(
            Pi::url('static/custom/js/eefocus-linkage.js')
        );
        $id = md5(uniqid());

        $html = <<<'EOT'
        <div id="%s" class="pi-checkbox">
        </div>
        <script>
            new eefocus.Checkbox("%s", "%s", %s);
        </script>
EOT;

        return sprintf(
            $html,
            $id,
            $id,
            $element->getName(),
            json_encode($element->getValue())
        );
    }
}
