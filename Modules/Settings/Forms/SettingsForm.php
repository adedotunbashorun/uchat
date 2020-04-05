<?php

namespace Modules\Settings\Forms;

use Kris\LaravelFormBuilder\Form;

class SettingsForm extends Form {

    public function buildForm()
    {
        $this
            ->add('website_title', 'text', [
                'label' => 'Website Title'
            ])
            ->add('app_name', 'text', [
                'label' => 'App Name'
            ])
            ->add('webmaster_email', 'text', [
                'label' => 'Webmaster Email'
            ])
            ->add('contact_email', 'text', [
                'label' => 'Contact Email'
            ])
            ->add('phone', 'text', [
                'label' => 'Phone Number'
            ])
            ->add('office_hours', 'text', [
                'label' => 'Office Hours'
            ])
            ->add('address', 'textarea', [
                'attr' => ['class' => 'wysihtml5 form-control', 'rows' => 4]
            ])
            ->add('facebook', 'text', [
                'label' => 'Facebook Link'
            ])
            ->add('facebook_plugin', 'textarea', [
                'label' => 'Facebook Plugin'
            ])
            ->add('twitter', 'text', [
                'label' => 'Twitter Link'
            ])
            ->add('twitter_plugin', 'textarea', [
                'label' => 'Twitter Plugin'
            ])
            ->add('instagram', 'text', [
                'label' => 'Instagram Link'
            ])
            ->add('instagram_plugin', 'textarea', [
                'label' => 'Instagram Plugin'
            ])
            ->add('linkedin', 'text', [
                'label' => 'Linkedin Link'
            ])
            ->add('linkedin_plugin', 'textarea', [
                'label' => 'Linkedin Plugin'
            ])
            ->add('welcome_message', 'textarea', [
                'label' => 'Welcome Message',
                'attr'  => ['class' => 'wysihtml5 form-control', 'rows' => 4]
            ])
            ->add('google_analytics', 'textarea', [
                'attr' => ['class' => 'form-control', 'rows' => 4]
            ])
            ->add('tawk_plugin', 'textarea', [
                'label'=>'Live Chat Plugin',
                'attr' => ['class' => 'form-control', 'rows' => 4]
            ])
            ->add('map', 'textarea', [
                'attr' => ['class' => 'form-control', 'rows' => 4]
            ])
            ->add('website_description', 'textarea', [
                'attr' => ['class' => 'form-control', 'rows' => 4]
            ])
            ->add('website_keywords', 'textarea', [
                'attr' => ['class' => 'form-control', 'rows' => 4]
            ])
            ->add('image', 'file', [
                'label' => 'Logo'
            ])
            ->add('mail_driver', 'select', [
                'label'       => 'Mail Driver',
                'choices'     => $this->getData('drivers'),
                /*'empty_value' => '- Set mail driver -',*/
                'selected'    => 'mail'
            ])
            ->add('mail_from_name', 'text', [
                'label' => 'Mail From (Name)',
                'default_value'=>config('myapp.website_title'),
            ])
            ->add('mail_from_address', 'text', [
                'label' => 'Mail From (Address)',
                'default_value'=>config('myapp.contact_email'),
            ])
            ->add('mail_host', 'text', [
                'label' => 'Mail Host',
                'default_value'=>'smtp.mailgun.org'
            ])
            ->add('mail_port', 'text', [
                'label' => 'Mail Port',
                'default_value'=>587
            ])
            ->add('mail_username', 'text', [
                'label' => 'Mail Username'
            ])
            ->add('mail_password', 'password', [
                'label' => 'Mail Password',
                'default_value'=>'null'
            ])
            ->add('mail_encryption', 'text', [
                'label' => 'Mail Encryption',
                /*'default_value'=>'tls'*/
            ])
            ->add('mailgun_domain', 'text', [
                'label' => 'Mailgun Domain'
            ])
            ->add('mailgun_secret', 'text', [
                'label' => 'Mailgun Secret'
            ])
            ->add('newsletter_msg','textarea', [
                'label' => 'Footer Newsletter Content',
                'attr' => ['rows'=>3]
            ])
            ->add('footer_about_msg','textarea', [
                'label' => 'Footer About Us Content',
                'attr' => ['rows'=>3]
            ])
            ->add('paypal_client_id', 'text', [
                'label' => 'Paypal Client ID'
            ])
            ->add('paypal_client_secret', 'password', [
                'label' => 'Paypal Secret Key'
            ])
            ->add('stripe_secret', 'password', [
                'label' => 'Stripe Secret'
            ])
            ->add('stripe_publish_key', 'text', [
                'label' => 'Stripe Publish Key'
            ]);
    }
}
