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

class CheckinFixtures extends Fixture
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
            $this->params->get('app_domain') != 'zuid-drecht.nl' && strpos($this->params->get('app_domain'), 'zuid-drecht.nl') == false &&
            $this->params->get('app_domain') != 'checking.nu' && strpos($this->params->get('app_domain'), 'checking.nu') == false
        ) {
            return false;
        }

        $id = Uuid::fromString('8f30215c-d778-480c-ac8c-8492d17c6a15');
        $place = new Place();
        $place->setName('Cafe de zotte raaf');
        $place->setDescription('Het gezeligste dijkcafe van nederland');
        $place->setOrganization($this->commonGroundService->cleanUrl(['component'=>'wrc', 'type'=>'organizations', 'id'=>'8b3f28c4-4163-47f1-9242-a4050bc26ede']));
        $place->setPublicAccess(true);
        $place->setSmokingAllowed(false);
        $place->setBagId('0363200000094929');
        $openingTime = new DateTime();
        $openingTime->setTime(16, 00);
        $place->setOpeningTime($openingTime);
        $closingTime = new DateTime();
        $closingTime->setTime(01, 00);
        $place->setClosingTime($closingTime);
        $manager->persist($place);
        $place->setId($id);
        $manager->persist($place);
        $manager->flush();
        $place = $manager->getRepository('App:Place')->findOneBy(['id'=> $id]);

        $id = Uuid::fromString('75f36e60-c798-41bb-ae11-4bc4e23aa147');
        $accommodation = new Accommodation();
        $accommodation->setPlace($place);
        $accommodation->setName('Tafel 1');
        $accommodation->setDescription('Tafel 1');
        $accommodation->setMaximumAttendeeCapacity(4);
        $manager->persist($accommodation);
        $accommodation->setId($id);
        $manager->persist($accommodation);
        $manager->flush();
        $accommodation = $manager->getRepository('App:Accommodation')->findOneBy(['id'=> $id]);

        $id = Uuid::fromString('014016d0-292e-4373-8bd2-4a0e427ac059');
        $accommodation = new Accommodation();
        $accommodation->setPlace($place);
        $accommodation->setName('Tafel 2');
        $accommodation->setDescription('Tafel 2');
        $accommodation->setMaximumAttendeeCapacity(10);
        $manager->persist($accommodation);
        $accommodation->setId($id);
        $manager->persist($accommodation);
        $manager->flush();
        $accommodation = $manager->getRepository('App:Accommodation')->findOneBy(['id'=> $id]);

        $id = Uuid::fromString('751c8a9f-f7cf-4f45-9c16-72ed74d4eba1');
        $accommodation = new Accommodation();
        $accommodation->setPlace($place);
        $accommodation->setName('Bar');
        $accommodation->setDescription('Bar');
        $accommodation->setMaximumAttendeeCapacity(15);
        $manager->persist($accommodation);
        $accommodation->setId($id);
        $manager->persist($accommodation);
        $manager->flush();
        $accommodation = $manager->getRepository('App:Accommodation')->findOneBy(['id'=> $id]);

        $id = Uuid::fromString('f5b473e9-a2d8-4383-b268-265c340f4bc5');
        $place = new Place();
        $place->setName('Restautant Goudlust');
        $place->setDescription('In deze vormalige dijkgraaf woning geniet u van voortreffelijk eten bereid met locale ingredienten');
        $place->setOrganization($this->commonGroundService->cleanUrl(['component'=>'wrc', 'type'=>'organizations', 'id'=>'a3c5906a-5cd2-4a51-82a6-5833bfa094e1']));
        $place->setPublicAccess(true);
        $place->setSmokingAllowed(false);
        $place->setBagId('0363200000094929');
        $openingTime = new DateTime();
        $openingTime->setTime(11, 00);
        $place->setOpeningTime($openingTime);
        $closingTime = new DateTime();
        $closingTime->setTime(23, 00);
        $place->setClosingTime($closingTime);
        $manager->persist($place);
        $place->setId($id);
        $manager->persist($place);
        $manager->flush();
        $place = $manager->getRepository('App:Place')->findOneBy(['id'=> $id]);

        $id = Uuid::fromString('c6f5ec24-7321-4176-a588-a3bb0bf2b62e');
        $accommodation = new Accommodation();
        $accommodation->setPlace($place);
        $accommodation->setName('Tafel 1');
        $accommodation->setDescription('Tafel 1');
        $accommodation->setMaximumAttendeeCapacity(25);
        $manager->persist($accommodation);
        $accommodation->setId($id);
        $manager->persist($accommodation);
        $manager->flush();
        $accommodation = $manager->getRepository('App:Accommodation')->findOneBy(['id'=> $id]);

        $id = Uuid::fromString('21cc4b1f-f9d6-4059-95e3-67535d5dfb9a');
        $accommodation = new Accommodation();
        $accommodation->setPlace($place);
        $accommodation->setName('Tafel 2');
        $accommodation->setDescription('Tafel 2');
        $accommodation->setMaximumAttendeeCapacity(8);
        $manager->persist($accommodation);
        $accommodation->setId($id);
        $manager->persist($accommodation);
        $manager->flush();
        $accommodation = $manager->getRepository('App:Accommodation')->findOneBy(['id'=> $id]);

        $id = Uuid::fromString('9f847ce1-eeb6-4e86-ad58-86dda3e18302');
        $accommodation = new Accommodation();
        $accommodation->setPlace($place);
        $accommodation->setName('Graven zaal');
        $accommodation->setDescription('In deze kleine zaal kunt u tot max 12 personen prive dineren');
        $accommodation->setMaximumAttendeeCapacity(12);
        $manager->persist($accommodation);
        $accommodation->setId($id);
        $manager->persist($accommodation);
        $manager->flush();
        $accommodation = $manager->getRepository('App:Accommodation')->findOneBy(['id'=> $id]);

        $id = Uuid::fromString('dae29298-7068-4c03-8b60-92c4056ed99f');
        $place = new Place();
        $place->setName('Hotel Dijkzicht');
        $place->setDescription('Gevestigd in een oud-tol huis kijkt dit prachtige hotel uit op de drechtse dijk');
        $place->setOrganization($this->commonGroundService->cleanUrl(['component'=>'wrc', 'type'=>'organizations', 'id'=>'f302b75e-a233-4ddf-95b5-f8603f2e80e9']));
        $place->setPublicAccess(true);
        $place->setSmokingAllowed(false);
        $place->setBagId('0363200000094929');
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

        $id = Uuid::fromString('66e957d7-f3e1-4115-b5d7-b8a617dc0208');
        $accommodation = new Accommodation();
        $accommodation->setPlace($place);
        $accommodation->setName('Kamer 1');
        $accommodation->setDescription('Kamer 1');
        $accommodation->setMaximumAttendeeCapacity(50);
        $manager->persist($accommodation);
        $accommodation->setId($id);
        $manager->persist($accommodation);
        $manager->flush();
        $accommodation = $manager->getRepository('App:Accommodation')->findOneBy(['id'=> $id]);

        $id = Uuid::fromString('2272cdd8-05ea-4f3e-b87a-0717bab1866c');
        $accommodation = new Accommodation();
        $accommodation->setPlace($place);
        $accommodation->setName('Kamer 2');
        $accommodation->setDescription('Kamer 2');
        $accommodation->setMaximumAttendeeCapacity(2);
        $manager->persist($accommodation);
        $accommodation->setId($id);
        $manager->persist($accommodation);
        $manager->flush();
        $accommodation = $manager->getRepository('App:Accommodation')->findOneBy(['id'=> $id]);

        $id = Uuid::fromString('1c1b928d-3d71-416d-a522-46e2da4a1fb7');
        $place = new Place();
        $place->setName('Camping de alpen koe');
        $place->setDescription('Camperen bij de boer');
        $place->setOrganization($this->commonGroundService->cleanUrl(['component'=>'wrc', 'type'=>'organizations', 'id'=>'0d3b7b6d-5ab2-442b-b4ff-472fd4112922']));
        $place->setPublicAccess(true);
        $place->setSmokingAllowed(false);
        $place->setBagId('0363200000094929');
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

        $id = Uuid::fromString('2779147c-8429-4c86-8ba1-39b74c83ee20');
        $accommodation = new Accommodation();
        $accommodation->setPlace($place);
        $accommodation->setName('Caravan plaats');
        $accommodation->setDescription('Caravan plaats');
        $accommodation->setMaximumAttendeeCapacity(4);
        $manager->persist($accommodation);
        $accommodation->setId($id);
        $manager->persist($accommodation);
        $manager->flush();
        $accommodation = $manager->getRepository('App:Accommodation')->findOneBy(['id'=> $id]);

        $id = Uuid::fromString('5714af42-9660-4041-8d22-b737a5936bcd');
        $accommodation = new Accommodation();
        $accommodation->setPlace($place);
        $accommodation->setName('Tentplaats');
        $accommodation->setDescription('Tentplaats');
        $accommodation->setMaximumAttendeeCapacity(2);
        $manager->persist($accommodation);
        $accommodation->setId($id);
        $manager->persist($accommodation);
        $manager->flush();
        $accommodation = $manager->getRepository('App:Accommodation')->findOneBy(['id'=> $id]);

        $manager->flush();

        $id = Uuid::fromString('fe5d966c-8999-4df5-9679-a0a8fad6f8c8');
        $place = new Place();
        $place->setName('Mc Donalds Zuid-Drecht');
        $place->setDescription('Mc Donalds Zuid-Drecht');
        $place->setOrganization($this->commonGroundService->cleanUrl(['component'=>'wrc', 'type'=>'organizations', 'id'=>'e3137e4f-e44d-4400-adbd-0fa1b4be9d65']));
        $place->setPublicAccess(true);
        $place->setSmokingAllowed(false);
        $place->setBagId('0363200000094929');
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
        $accommodation->setMaximumAttendeeCapacity(50);
        $manager->persist($accommodation);
        $accommodation->setId($id);
        $manager->persist($accommodation);
        $manager->flush();
        $accommodation = $manager->getRepository('App:Accommodation')->findOneBy(['id'=> $id]);

        $id = Uuid::fromString('75a116e3-0e9b-4ca7-ae3b-190a70d519a7');
        $place = new Place();
        $place->setName('Creative Grounds');
        $place->setDescription('Creative Grounds');
        $place->setOrganization($this->commonGroundService->cleanUrl(['component'=>'wrc', 'type'=>'organizations', 'id'=>'62bff497-cb91-443e-9da9-21a0b38cd536']));
        $place->setPublicAccess(true);
        $place->setSmokingAllowed(false);
        $place->setBagId('0363200000094929');
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
        $accommodation->setMaximumAttendeeCapacity(100);
        $manager->persist($accommodation);
        $accommodation->setId($id);
        $manager->persist($accommodation);
        $manager->flush();
        $accommodation = $manager->getRepository('App:Accommodation')->findOneBy(['id'=> $id]);


        $id = Uuid::fromString('a656d7c1-0313-4fd6-aba1-a12a4bcc812a');
        $accommodation = new Accommodation();
        $accommodation->setPlace($place);
        $accommodation->setName('Emmalaan 9');
        $accommodation->setDescription('Emmalaan 9');
        $accommodation->setMaximumAttendeeCapacity(100);
        $manager->persist($accommodation);
        $accommodation->setId($id);
        $manager->persist($accommodation);
        $manager->flush();
        $accommodation = $manager->getRepository('App:Accommodation')->findOneBy(['id'=> $id]);
    }
}
