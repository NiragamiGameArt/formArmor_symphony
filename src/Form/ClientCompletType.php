<?php
namespace App\Form;

use App\Entity\Client;
use App\Entity\Statut;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ClientCompletType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
			->add('statut', EntityType::class, array('class' => Statut::class, 'choice_label' => 'type', 'multiple' => false))
			->add('nom', TextType::class)
			->add('adresse', TextType::class)
			->add('cp', TextType::class)
			->add('ville', TextType::class)
			->add('email', TextType::class)
			->add('nbhcpta', TextType::class)
			->add('nbhbur', NumberType::class)
            ->add('Valider', SubmitType::class)
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Client::class
        ));
    }
}
