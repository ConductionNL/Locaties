<?php

namespace App\DataFixtures;

use App\Entity\Accommodation;
use App\Entity\Place;
use Conduction\CommonGroundBundle\Service\CommonGroundService;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Ramsey\Uuid\Uuid;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class ZuiddrechtFixtures extends Fixture
{
    private $commonGroundService;
    private $params;

    public function __construct(CommonGroundService $commonGroundService, ParameterBagInterface $params)
    {
        $this->commonGroundService = $commonGroundService;
        $this->params = $params;
    }

    public function load(ObjectManager $manager)
    {
        if (
            !$this->params->get('app_build_all_fixtures') &&
            $this->params->get('app_domain') != 'zuiddrecht.nl' && strpos($this->params->get('app_domain'), 'zuiddrecht.nl') == false &&
            $this->params->get('app_domain') != 'zuid-drecht.nl' && strpos($this->params->get('app_domain'), 'zuid-drecht.nl') == false
        ) {
            return false;
        }

        $id = Uuid::fromString('db91b486-cbbb-47aa-9771-77862fda6c15');
        $place = new Place();
        $place->setName('Huis der gemeente');
        $place->setDescription('Het gemeente huis van zuid-drecht');
        $place->setOrganization($this->commonGroundService->cleanUrl(['component'=>'wrc', 'type'=>'organizations', 'id'=>'4d1eded3-fbdf-438f-9536-8747dd8ab591']));
        $place->setPublicAccess(true);
        $place->setSmokingAllowed(false);
        $place->setBagId('0363200000094929');
        $openingTime = new DateTime();
        $openingTime->setTime(8, 00);
        $place->setOpeningTime($openingTime);
        $closingTime = new DateTime();
        $closingTime->setTime(17, 00);
        $place->setClosingTime($closingTime);
        $manager->persist($place);
        $place->setId($id);
        $manager->persist($place);
        $manager->flush();
        $place = $manager->getRepository('App:Place')->findOneBy(['id'=> $id]);

        $id = Uuid::fromString('24eafc4c-14fa-432b-84ae-06356804ac1d');
        $accommodation = new Accommodation();
        $accommodation->setPlace($place);
        $accommodation->setName('Raadszaal');
        $accommodation->setDescription('Raadszaal');
        $manager->persist($accommodation);
        $accommodation->setId($id);
        $manager->persist($accommodation);
        $manager->flush();
        $accommodation = $manager->getRepository('App:Accommodation')->findOneBy(['id'=> $id]);

        $id = Uuid::fromString('e65a9fcc-488e-4734-aa64-33de4f635bb8');
        $accommodation = new Accommodation();
        $accommodation->setPlace($place);
        $accommodation->setName('Trouwzaal');
        $accommodation->setDescription('Trouwzaal');
        $manager->persist($accommodation);
        $accommodation->setId($id);
        $manager->persist($accommodation);
        $manager->flush();
        $accommodation = $manager->getRepository('App:Accommodation')->findOneBy(['id'=> $id]);

        $id = Uuid::fromString('cd4cfa43-0d1e-4053-8325-f01b793d9a0d');
        $accommodation = new Accommodation();
        $accommodation->setPlace($place);
        $accommodation->setName('De bonte zaal');
        $accommodation->setDescription('vergader ruimte');
        $manager->persist($accommodation);
        $accommodation->setId($id);
        $manager->persist($accommodation);
        $manager->flush();
        $accommodation = $manager->getRepository('App:Accommodation')->findOneBy(['id'=> $id]);

        $id = Uuid::fromString('fe5d966c-8999-4df5-9679-a0a8fad6f8c8');
        $place = new Place();
        $place->setName('Mc Donalds Zuid-Drecht');
        $place->setDescription('Mc Donalds Zuid-Drecht');
        $place->setOrganization($this->commonGroundService->cleanUrl(['component'=>'wrc', 'type'=>'organizations', 'id'=>'e3137e4f-e44d-4400-adbd-0fa1b4be9d65']));
        $place->setPublicAccess(true);
        $place->setSmokingAllowed(false);
        $openingTime = new DateTime();
        $openingTime->setTime(00, 00);
        $place->setOpeningTime($openingTime);
        $closingTime = new DateTime();
        $closingTime->setTime(00, 00);
        $place->setClosingTime($closingTime);
        $manager->persist($place);
        $place->setId($id);
        $manager->persist($place);
        $manager->flush();
        $place = $manager->getRepository('App:Place')->findOneBy(['id'=> $id]);

        $id = Uuid::fromString('d7aa6399-88b8-4451-9c23-dd15ca1719b5');
        $accommodation = new Accommodation();
        $accommodation->setPlace($place);
        $accommodation->setName('Mc Donalds Zuid-Drecht');
        $accommodation->setDescription('Mc Donalds Zuid-Drecht');
        $manager->persist($accommodation);
        $accommodation->setId($id);
        $manager->persist($accommodation);
        $manager->flush();
        $accommodation = $manager->getRepository('App:Accommodation')->findOneBy(['id'=> $id]);

        $id = Uuid::fromString('75a116e3-0e9b-4ca7-ae3b-190a70d519a7');
        $place = new Place();
        $place->setName('Creative Ground');
        $place->setDescription('Creative Ground');
        $place->setOrganization($this->commonGroundService->cleanUrl(['component'=>'wrc', 'type'=>'organizations', 'id'=>'62bff497-cb91-443e-9da9-21a0b38cd536']));
        $place->setPublicAccess(true);
        $place->setSmokingAllowed(false);
        $openingTime = new DateTime();
        $openingTime->setTime(00, 00);
        $place->setOpeningTime($openingTime);
        $closingTime = new DateTime();
        $closingTime->setTime(00, 00);
        $place->setClosingTime($closingTime);
        $manager->persist($place);
        $place->setId($id);
        $manager->persist($place);
        $manager->flush();
        $place = $manager->getRepository('App:Place')->findOneBy(['id'=> $id]);

        $id = Uuid::fromString('d96c8148-16f0-4f0b-9010-e1025b9cb6f1');
        $accommodation = new Accommodation();
        $accommodation->setPlace($place);
        $accommodation->setName('Emmalaan 7');
        $accommodation->setDescription('Emmalaan 7');
        $manager->persist($accommodation);
        $accommodation->setId($id);
        $manager->persist($accommodation);
        $manager->flush();
        $accommodation = $manager->getRepository('App:Accommodation')->findOneBy(['id'=> $id]);
    }
}
