<?php
/*
 * WellCommerce Open-Source E-Commerce Platform
 *
 * This file is part of the WellCommerce package.
 *
 * (c) Adam Piotrowski <adam@wellcommerce.org>
 *
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 */
namespace WellCommerce\Bundle\OrderBundle\Form\Admin;

use WellCommerce\Bundle\CoreBundle\Form\AbstractFormBuilder;
use WellCommerce\Bundle\FormBundle\Elements\FormInterface;

/**
 * Class OrderFormBuilder
 *
 * @author Adam Piotrowski <adam@wellcommerce.org>
 */
class OrderFormBuilder extends AbstractFormBuilder
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormInterface $form)
    {
        $countries = $this->get('country.repository')->all();

        $addresses = $form->addChild($this->getElement('nested_fieldset', [
            'name'  => 'addresses',
            'label' => $this->trans('order.heading.addresses'),
        ]));

        $contactDetails = $addresses->addChild($this->getElement('nested_fieldset', [
            'name'  => 'contactDetails',
            'label' => '',
        ]));

        $contactDetails->addChild($this->getElement('tip', [
            'tip' => '<p>' . $this->trans('client.heading.contact_details') . '</p>',
        ]));

        $contactDetails->addChild($this->getElement('text_field', [
            'name'  => 'contactDetails.firstName',
            'label' => $this->trans('client.label.contact_details.first_name'),
        ]));

        $contactDetails->addChild($this->getElement('text_field', [
            'name'  => 'contactDetails.lastName',
            'label' => $this->trans('client.label.contact_details.last_name'),
        ]));

        $contactDetails->addChild($this->getElement('text_field', [
            'name'  => 'contactDetails.phone',
            'label' => $this->trans('client.label.contact_details.phone'),
        ]));

        $contactDetails->addChild($this->getElement('text_field', [
            'name'  => 'contactDetails.secondaryPhone',
            'label' => $this->trans('client.label.contact_details.secondary_phone'),
        ]));

        $contactDetails->addChild($this->getElement('text_field', [
            'name'  => 'contactDetails.email',
            'label' => $this->trans('client.label.contact_details.email'),
        ]));

        $billingAddress = $addresses->addChild($this->getElement('nested_fieldset', [
            'name'  => 'billingAddress',
            'label' => '',
        ]));

        $billingAddress->addChild($this->getElement('tip', [
            'tip' => '<p>' . $this->trans('client.heading.billing_address') . '</p>',
        ]));

        $billingAddress->addChild($this->getElement('text_field', [
            'name'  => 'billingAddress.firstName',
            'label' => $this->trans('client.label.address.first_name'),
        ]));

        $billingAddress->addChild($this->getElement('text_field', [
            'name'  => 'billingAddress.lastName',
            'label' => $this->trans('client.label.address.last_name'),
        ]));

        $billingAddress->addChild($this->getElement('text_field', [
            'name'  => 'billingAddress.street',
            'label' => $this->trans('client.label.address.street'),
        ]));

        $billingAddress->addChild($this->getElement('text_field', [
            'name'  => 'billingAddress.streetNo',
            'label' => $this->trans('client.label.address.street_no'),
        ]));

        $billingAddress->addChild($this->getElement('text_field', [
            'name'  => 'billingAddress.flatNo',
            'label' => $this->trans('client.label.address.flat_no'),
        ]));

        $billingAddress->addChild($this->getElement('text_field', [
            'name'  => 'billingAddress.postCode',
            'label' => $this->trans('client.label.address.post_code'),
        ]));

        $billingAddress->addChild($this->getElement('text_field', [
            'name'  => 'billingAddress.province',
            'label' => $this->trans('client.label.address.province'),
        ]));

        $billingAddress->addChild($this->getElement('text_field', [
            'name'  => 'billingAddress.city',
            'label' => $this->trans('client.label.address.city'),
        ]));

        $billingAddress->addChild($this->getElement('select', [
            'name'    => 'billingAddress.country',
            'label'   => $this->trans('client.label.address.country'),
            'options' => $countries,
        ]));

        $shippingAddress = $addresses->addChild($this->getElement('nested_fieldset', [
            'name'  => 'shippingAddress',
            'label' => '',
        ]));

        $shippingAddress->addChild($this->getElement('tip', [
            'tip' => '<p>' . $this->trans('client.heading.shipping_address') . '</p>',
        ]));

        $shippingAddress->addChild($this->getElement('text_field', [
            'name'  => 'shippingAddress.firstName',
            'label' => $this->trans('client.label.address.first_name'),
        ]));

        $shippingAddress->addChild($this->getElement('text_field', [
            'name'  => 'shippingAddress.lastName',
            'label' => $this->trans('client.label.address.last_name'),
        ]));

        $shippingAddress->addChild($this->getElement('text_field', [
            'name'  => 'shippingAddress.street',
            'label' => $this->trans('client.label.address.street'),
        ]));

        $shippingAddress->addChild($this->getElement('text_field', [
            'name'  => 'shippingAddress.streetNo',
            'label' => $this->trans('client.label.address.street_no'),
        ]));

        $shippingAddress->addChild($this->getElement('text_field', [
            'name'  => 'shippingAddress.flatNo',
            'label' => $this->trans('client.label.address.flat_no'),
        ]));

        $shippingAddress->addChild($this->getElement('text_field', [
            'name'  => 'shippingAddress.postCode',
            'label' => $this->trans('client.label.address.post_code'),
        ]));

        $shippingAddress->addChild($this->getElement('text_field', [
            'name'  => 'shippingAddress.province',
            'label' => $this->trans('client.label.address.province'),
        ]));

        $shippingAddress->addChild($this->getElement('text_field', [
            'name'  => 'shippingAddress.city',
            'label' => $this->trans('client.label.address.city'),
        ]));

        $shippingAddress->addChild($this->getElement('select', [
            'name'    => 'shippingAddress.country',
            'label'   => $this->trans('client.label.address.country'),
            'options' => $countries,
        ]));

        $form->addFilter($this->getFilter('no_code'));
        $form->addFilter($this->getFilter('trim'));
        $form->addFilter($this->getFilter('secure'));
    }
}
