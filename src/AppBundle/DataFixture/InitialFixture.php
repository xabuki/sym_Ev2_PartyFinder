<?php namespace AppBundle\DataFixtures; 
 
use Faker; 
use AppBundle\Entity\Entrada;
use AppBundle\Entity\Discoteca; 
use AppBundle\Entity\DiscoMaster; 
use AppBundle\Entity\Eventos; 
use AppBundle\Entity\RRPP;
use AppBundle\Entity\Usuario; 
 
use Doctrine\Bundle\FixturesBundle\ORMFixtureInterface;
use Doctrine\Persistence\ObjectManager ; 
 
class InitialFixture  implements ORMFixtureInterface {  
    public function load(ObjectManager $manager)   {   
        // Creating 20 job offers     
    for ($i = 0; $i < 10; $i++)     
    {       
      $jobFaker = Faker\Factory::create(); 
 
      //Usuario
  
      $usuario = new Usuario();
      $usuario->setEmail("email_$i@party.com");
      $usuario->setUsername("user_$i");
      $usuario->setPassword("admin");
      $manager->persist($usuario);
      
      //Discoteca
      $discoteca = new Discoteca();
      $discoteca->setNombre($jobFaker->company);
      $discoteca->setCif($jobFaker->postcode);
      $discoteca->setUbicacion($jobFaker->address);
      $discoteca->setImagen($jobFaker->imageUrl());
      $manager->persist($discoteca);
      
      //RRPP
      $rrpp =new RRPP();
      $rrpp->setEmail("email_$i@party.com");
      $rrpp->setUsername("user_$i");
      $rrpp->setCuentaInstagram("rrpp_$i");
      $rrpp->setNombre($jobFaker->name);
      $rrpp->setPassword("rrpp");
      $rrpp->setNumTel($jobFaker->numerify('#########'));
      $manager->persist($rrpp);
      
      //Disco Master
      $discoMaster = new DiscoMaster();
      $discoMaster->setDiscoteca($discoteca);
      $discoMaster->setEmail($jobFaker->email);
      $discoMaster->setUsername($jobFaker->userName);
      $discoMaster->setPassword("admin");
      $manager->persist($discoMaster);
      
      
         //Eventos
       $eventos = new Eventos();
      $eventos->setDiscoteca($discoteca);
      $eventos->setFecha($jobFaker->dateTime);
      $eventos->setHoraApertura($jobFaker->dateTime);
      $eventos->setCantEntradasMax(10);
      $eventos->setImagen($jobFaker->imageUrl());
      $eventos->setTitulo($jobFaker->title);
      $manager->persist($eventos);
      
   
       
      //Entrasda
      for($j=0; $j<9; $j++){
      $entrada = new Entrada();
      $entrada->setEventos($eventos);
      $entrada ->setHoraLimite('Sin hora');
      $entrada->setImagenEntrada($jobFaker->imageUrl());//esto deberia ser una imagen qr
      $entrada->setPrecio($jobFaker->randomNumber());
      $manager->persist($entrada);
      }
      
      
      
      
      
    } 
 
      $manager->flush();   
      
    }

    
} 
