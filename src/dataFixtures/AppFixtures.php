<?php
/**
 * Created by PhpStorm.
 * User: Aristide
 * Date: 28/07/2018
 * Time: 00:13
 */

namespace App\dataFixtures;


use App\Entity\Job;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
      for ($i = 0; $i < 40 ; $i++){
          $job = new Job();
          $job->setTitle("Job n°".$i);
          $job->setDescription("informaticien");
          $job->setCategorie(1);
          $manager->persist($job);
      }
      $manager->flush();
    }
}