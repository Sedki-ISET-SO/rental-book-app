<?php

namespace App\Form;

use App\Entity\Listing;
use App\Form\ListingAmenityType;
use App\Form\ListingPictureType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class ListingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('listingCategory', null, [
                "label" => "Your Listing Category:",
            ])
            ->add('name', null, [
                "label" => "Your Listing Name:",
            ])
            ->add('description', null, [
                "label" => "Listing Description:"
            ])
            ->add('price', null, [
                "label" => "Listing Price Per Night:"
            ])
            ->add('beds', null, [
                "label" => "Listing Total Beds:"
            ])
            ->add('guests', null, [
                "label" => "Listing Total Guests Allowed:"
            ])
            ->add('latitude', null, [
                "label" => "Listing Latitude:"
            ])
            ->add('longitude', null, [
                "label" => "Listing Longitude:"
            ])
            ->add('listingAmenities', CollectionType::class, [
                'entry_type' => ListingAmenityType::class,
                'entry_options' => ['label' => false],
                'by_reference' => false,
                // this allows the creation of new forms and the prototype too
                'allow_add' => true,
                // self explanatory, this one allows the form to be removed
                'allow_delete' => true
            ])
            ->add('enregistrer', SubmitType::class, [
                "attr" => ["class" => "bg-danger text-white"],
                'row_attr' => ['class' => 'text-center']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Listing::class,
        ]);
    }
}
