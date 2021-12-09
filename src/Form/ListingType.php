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
            ->add('pictures', CollectionType::class, [
                'entry_type' => ListingPictureType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'required' => false,
                'label'=> "Listing Picutres:",
                'by_reference' => false,
                'disabled' => false,
            ])
            ->add('availablities', CollectionType::class, [
                'entry_type' => ListingAvailabilityType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'required' => false,
                'label'=> "Listing Availability Dates",
                'by_reference' => false,
                'disabled' => false,
            ])
            ->add('amenities', CollectionType::class, [
                'entry_type' => ListingAmenityType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'required' => false,
                'label'=> "Listing Amenities:",
                'by_reference' => false,
                'disabled' => false,
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
