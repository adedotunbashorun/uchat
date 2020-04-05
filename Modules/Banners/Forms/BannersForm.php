<?php namespace modules\Banners\Forms;

use Kris\LaravelFormBuilder\Form;

class BannersForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('image', 'file',[
                'label' => 'Banner'
            ])
            ->add('caption', 'textarea',[
                'attr'=>['class'=>'mini-summernote']
            ])
            ->add('body', 'textarea',[
                'attr'=>['class'=>'mini-summernote']
            ])
            ->add('body_font_size', 'select', [
                'choices' => [
                    'large' => 'Large',
                    'large-alt' => 'Large Alternative',
                    'medium' => 'Medium',
                    'small' => 'Small',
                    'small-alt' => 'Small Alternative',
                ],
            ])
            ->add('position', 'text',[
                'label' => 'Order'
            ])
            ->add('link_label', 'text',[
                'label'=>'Link Label'
            ])
            ->add('link', 'text',[
                'label'=>'Link To',
                'attr'=>['placeholder'=>'http://']
            ])
            ->add('status', 'select', [
                'choices' => ['1' => 'live', '0' => 'draft'],
            ]);
    }
}