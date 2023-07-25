<?php
declare(strict_types=1);

namespace ImportUsersKata\Test;

use ImportUsersKata\Importer;

final class FakeImporter extends Importer
{
    protected function retrieveContent(string $url)
    {
        return "{\"results\":[{\"gender\":\"female\",\"name\":{\"title\":\"Mrs\",\"first\":\"Nevaeh\",\"last\":\"Dunn\"},\"location\":{\"street\":{\"number\":9249,\"name\":\"Oak Lawn Ave\"},\"city\":\"Orange\",\"state\":\"Western Australia\",\"country\":\"Australia\",\"postcode\":5436,\"coordinates\":{\"latitude\":\"-88.9811\",\"longitude\":\"59.7716\"},\"timezone\":{\"offset\":\"-7:00\",\"description\":\"Mountain Time (US & Canada)\"}},\"email\":\"nevaeh.dunn@example.com\"},{\"gender\":\"female\",\"name\":{\"title\":\"Miss\",\"first\":\"Sara\",\"last\":\"Abdallah\"},\"location\":{\"street\":{\"number\":7852,\"name\":\"Lovisenlund\"},\"city\":\"Bleik\",\"state\":\"Buskerud\",\"country\":\"Norway\",\"postcode\":\"1409\",\"coordinates\":{\"latitude\":\"-68.0604\",\"longitude\":\"-173.8949\"},\"timezone\":{\"offset\":\"-11:00\",\"description\":\"Midway Island, Samoa\"}},\"email\":\"sara.abdallah@example.com\"},{\"gender\":\"male\",\"name\":{\"title\":\"Mr\",\"first\":\"Melvin\",\"last\":\"Perrin\"},\"location\":{\"street\":{\"number\":3845,\"name\":\"Rue du Bât-D'Argent\"},\"city\":\"Lyon\",\"state\":\"Bouches-du-Rhône\",\"country\":\"France\",\"postcode\":53029,\"coordinates\":{\"latitude\":\"5.3959\",\"longitude\":\"172.5214\"},\"timezone\":{\"offset\":\"-1:00\",\"description\":\"Azores, Cape Verde Islands\"}},\"email\":\"melvin.perrin@example.com\"},{\"gender\":\"female\",\"name\":{\"title\":\"Mrs\",\"first\":\"Dawn\",\"last\":\"Snyder\"},\"location\":{\"street\":{\"number\":6819,\"name\":\"Lakeview St\"},\"city\":\"Rockhampton\",\"state\":\"South Australia\",\"country\":\"Australia\",\"postcode\":7852,\"coordinates\":{\"latitude\":\"52.3046\",\"longitude\":\"-25.8155\"},\"timezone\":{\"offset\":\"-3:00\",\"description\":\"Brazil, Buenos Aires, Georgetown\"}},\"email\":\"dawn.snyder@example.com\"},{\"gender\":\"female\",\"name\":{\"title\":\"Miss\",\"first\":\"Irina\",\"last\":\"Kaptein\"},\"location\":{\"street\":{\"number\":361,\"name\":\"Hooglandseweg-Noord\"},\"city\":\"Biggekerke\",\"state\":\"Drenthe\",\"country\":\"Netherlands\",\"postcode\":\"8209 KI\",\"coordinates\":{\"latitude\":\"5.6256\",\"longitude\":\"144.9188\"},\"timezone\":{\"offset\":\"-8:00\",\"description\":\"Pacific Time (US & Canada)\"}},\"email\":\"irina.kaptein@example.com\"}],\"info\":{\"seed\":\"a9b25cd955e2037h\",\"results\":5,\"page\":1,\"version\":\"1.4\"}}";
    }

}
