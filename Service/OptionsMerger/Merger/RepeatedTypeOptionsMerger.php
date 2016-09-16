<?php
/**
 * @author Anton Zoffmann
 * @copyright dasistweb GmbH (http://www.dasistweb.de)
 * Date: 16.09.16
 * Time: 13:46
 */

namespace Barbieswimcrew\Bundle\SymfonyFormRuleSetBundle\Service\OptionsMerger\Merger;


use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormInterface;

class RepeatedTypeOptionsMerger extends ScalarFormTypeOptionsMerger
{
    public function getMergedOptions(FormInterface $form, array $overrideOptions, $hidden)
    {
        /** @var array $originOptions */
        $originOptions = $form->getConfig()->getOptions();

        # do a merge of the standard scalar options
        $merged = parent::getMergedOptions($form, $overrideOptions, $hidden);

        if (isset($originOptions['options'])) {

            $merged['options']['attr']['class'] = $this->handleHiddenClass($merged['attr'], $hidden);
            $merged['options']['label_attr']['class'] = $this->handleHiddenClass($merged['label_attr'], $hidden);
        }

        return $merged;
    }

    protected function getApplicableClasses()
    {
        return array(
            RepeatedType::class,
        );
    }

    protected function getApplicableInterface()
    {
        return "";
    }


}