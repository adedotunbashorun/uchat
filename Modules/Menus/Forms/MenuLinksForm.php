<?php

namespace Modules\Menus\Forms;

use Kris\LaravelFormBuilder\Form;

class MenuLinksForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('title', 'text')
            ->add('parent_id', 'select', [
                'label'=>'Parent Link',
                'choices'=>$this->getData('links'),
                'empty_value' => '- Select Parent (Optional) -'
            ])
            ->add('url', 'text',[
                'label'=>'Url'
            ])
            ->add('page_id', 'select', [
                'label'=>'Page',
                'choices' => \Pages::allForSelect(),
                'empty_value' => '- Select Page -'
            ])
            ->add('status', 'select', [
                'choices' => ['1' => 'live', '0' => 'draft'],
                'empty_value' => '- Select status -',
                'selected'=>1
            ])
            /*->add('tagline','text')*/
           /* ->add('link_type', 'select', [
                'choices' => ['url'=>'URL',
                    'uri'=>'Site URI',
                    'page'=>'Page',
                    'category'=>'Category'],
                'empty_value' => '- Select status -'
            ])*/
            ->add('target', 'select', [
                'choices' => ['' => 'Current Window (default)', '_blank' => 'New Window (_blank)'],
                'empty_value' => '- Select status -'
            ])
            /*->add('active', 'textarea',[
                'attr'=>['class'=>'wysihtml5 form-control','rows'=>6]
            ])*/;
    }
}
