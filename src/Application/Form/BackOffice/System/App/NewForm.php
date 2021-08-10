<?php
    namespace App\Application\Form\BackOffice\System\App;

    use App\Domain\_mysql\System\Entity\App;
    use Symfony\Component\Form\AbstractType;
    use Symfony\Component\Form\Extension\Core\Type\SubmitType;
    use Symfony\Component\Form\Extension\Core\Type\TextType;
    use Symfony\Component\Form\FormBuilderInterface;
    use Symfony\Component\OptionsResolver\OptionsResolver;

    class NewForm extends AbstractType {

        public function buildForm(FormBuilderInterface $builder, array $options){
            $builder
                ->add('name', TextType::class)
                ->add('submit', SubmitType::class, ['label' => 'create app']);
        }

        public function configureOptions(OptionsResolver $resolver){
            $resolver->setDefaults([
                'data_class'    => App::class
            ]);
        }

    }