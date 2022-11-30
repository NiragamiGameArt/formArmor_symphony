<?php
namespace App\Form;

use App\Entity\Session_formation;
use App\Entity\Formation;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class SessionType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
			->add('formation', EntityType::class, array('class' => Formation::class, 'choice_label' => 'affichage', 'multiple' => false))
			->add('dateDebut', DateType::class)
			->add('nbPlaces', NumberType::class)
			->add('nbInscrits', NumberType::class)
			->add('close', CheckboxType::class, array('required' => false))
			->add('Valider', SubmitType::class)
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Session_formation::class
        ));
    }
}
