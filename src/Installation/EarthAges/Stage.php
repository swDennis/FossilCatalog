<?php

namespace App\Installation\EarthAges;

use Symfony\Contracts\Translation\TranslatorInterface;

class Stage
{
    public function __construct(
        private readonly TranslatorInterface $translator,
    ) {}

    public function getSql(): string
    {
        $sql = <<<SQL
INSERT INTO `earth_age_stage` (`id`, `name`, `earth_age_series_id`, `custom`)
VALUES (1, 'installation.stage.meghalayan', 1, false),
       (2, 'installation.stage.northgrippian', 1, false),
       (3, 'installation.stage.greenlandian', 1, false),
       (4, 'installation.stage.tarantian', 2, false),
       (5, 'installation.stage.ionian', 2, false),
       (6, 'installation.stage.calabrian', 2, false),
       (7, 'installation.stage.gelasian', 2, false),
       (8, 'installation.stage.piacenzian', 3, false),
       (9, 'installation.stage.zanclean', 3, false),
       (10, 'installation.stage.messinian', 4, false),
       (11, 'installation.stage.tortonian', 4, false),
       (12, 'installation.stage.serravallian', 4, false),
       (13, 'installation.stage.langhian', 4, false),
       (14, 'installation.stage.burdigalian', 4, false),
       (15, 'installation.stage.aquitanian', 4, false),
       (16, 'installation.stage.chattian', 5, false),
       (17, 'installation.stage.rupelian', 5, false),
       (18, 'installation.stage.priabonian', 6, false),
       (19, 'installation.stage.bartonian', 6, false),
       (20, 'installation.stage.lutetian', 6, false),
       (21, 'installation.stage.ypresian', 6, false),
       (22, 'installation.stage.thanetian', 7, false),
       (23, 'installation.stage.selandian', 7, false),
       (24, 'installation.stage.danian', 7, false),
       (25, 'installation.stage.maestrichtian', 8, false),
       (26, 'installation.stage.campanian', 8, false),
       (27, 'installation.stage.santonian', 8, false),
       (28, 'installation.stage.coniacian', 8, false),
       (29, 'installation.stage.turonian', 8, false),
       (30, 'installation.stage.cenomanian', 8, false),
       (31, 'installation.stage.albian', 9, false),
       (32, 'installation.stage.aptian', 9, false),
       (33, 'installation.stage.barremian', 9, false),
       (34, 'installation.stage.hauterivian', 9, false),
       (35, 'installation.stage.valanginian', 9, false),
       (36, 'installation.stage.berriasian', 9, false),
       (37, 'installation.stage.tithonian', 10, false),
       (38, 'installation.stage.kimmeridgian', 10, false),
       (39, 'installation.stage.oxfordian', 10, false),
       (40, 'installation.stage.callovian', 11, false),
       (41, 'installation.stage.bathonian', 11, false),
       (42, 'installation.stage.bajocian', 11, false),
       (43, 'installation.stage.aalenian', 11, false),
       (44, 'installation.stage.toarcian', 12, false),
       (45, 'installation.stage.pliensbachian', 12, false),
       (46, 'installation.stage.sinemurian', 12, false),
       (47, 'installation.stage.hettangian', 12, false),
       (48, 'installation.stage.rhaetian', 13, false),
       (49, 'Norinstallation.stage.norianium', 13, false),
       (50, 'installation.stage.carnian', 13, false),
       (51, 'installation.stage.ladinian', 14, false),
       (52, 'installation.stage.anisian', 14, false),
       (53, 'installation.stage.olenekian', 15, false),
       (54, 'installation.stage.induan', 15, false),
       (55, 'installation.stage.changhsingian', 16, false),
       (56, 'installation.stage.wuchiapingian', 16, false),
       (57, 'installation.stage.capitanian', 17, false),
       (58, 'installation.stage.wordian', 17, false),
       (59, 'installation.stage.roadian', 17, false),
       (60, 'installation.stage.kungurian', 18, false),
       (61, 'installation.stage.artinskian', 18, false),
       (62, 'installation.stage.sakmarian', 18, false),
       (63, 'installation.stage.asselian', 18, false),
       (64, 'installation.stage.gzhelian', 19, false),
       (65, 'installation.stage.kasimovian', 19, false),
       (66, 'installation.stage.moscovian', 19, false),
       (67, 'installation.stage.bashkirian', 19, false),
       (68, 'installation.stage.serpukhovian', 20, false),
       (69, 'installation.stage.visean', 20, false),
       (70, 'installation.stage.tournaisian', 20, false),
       (71, 'installation.stage.famennian', 21, false),
       (72, 'installation.stage.frasnian', 21, false),
       (73, 'installation.stage.givetian', 22, false),
       (74, 'installation.stage.eifelian', 22, false),
       (75, 'installation.stage.emsian', 23, false),
       (76, 'installation.stage.pratigian', 23, false),
       (77, 'installation.stage.lochkovian', 23, false),
       (78, 'installation.stage.pridoli', 24, false),
       (79, 'installation.stage.ludfordian', 25, false),
       (80, 'installation.stage.gorstian', 25, false),
       (81, 'installation.stage.homerian', 26, false),
       (82, 'installation.stage.sheinwoodian', 26, false),
       (83, 'installation.stage.telychian', 27, false),
       (84, 'installation.stage.aeronian', 27, false),
       (85, 'installation.stage.rhuddanian', 27, false),
       (86, 'installation.stage.hirnantian', 28, false),
       (87, 'installation.stage.katian', 28, false),
       (88, 'installation.stage.sandbian', 28, false),
       (89, 'installation.stage.darriwilian', 29, false),
       (90, 'installation.stage.dapingian', 29, false),
       (91, 'installation.stage.floian', 30, false),
       (92, 'installation.stage.tremadocian', 30, false),
       (93, 'installation.stage.10thStage', 31, false),
       (94, 'installation.stage.jiangshanian', 31, false),
       (95, 'installation.stage.paibian', 31, false),
       (96, 'installation.stage.guzhangian', 32, false),
       (97, 'installation.stage.drumian', 32, false),
       (98, 'installation.stage.wuliuan', 32, false),
       (99, 'installation.stage.4thStage', 33, false),
       (100, 'installation.stage.3rdStage', 33, false),
       (101, 'installation.stage.2ndStage', 34, false),
       (102, 'installation.stage.fortunian', 34, false);
SQL;

        foreach ($this->getTranslationKeys() as $translationKey) {

            $sql = str_replace($translationKey, $this->translator->trans($translationKey), $sql);
        }

        return $sql;
    }

    /**
     * @return array<int, string>
     */
    private function getTranslationKeys(): array
    {
        return [
            'installation.stage.meghalayan',
            'installation.stage.northgrippian',
            'installation.stage.greenlandian',
            'installation.stage.tarantian',
            'installation.stage.ionian',
            'installation.stage.calabrian',
            'installation.stage.gelasian',
            'installation.stage.piacenzian',
            'installation.stage.zanclean',
            'installation.stage.messinian',
            'installation.stage.tortonian',
            'installation.stage.serravallian',
            'installation.stage.langhian',
            'installation.stage.burdigalian',
            'installation.stage.aquitanian',
            'installation.stage.chattian',
            'installation.stage.rupelian',
            'installation.stage.priabonian',
            'installation.stage.bartonian',
            'installation.stage.lutetian',
            'installation.stage.ypresian',
            'installation.stage.thanetian',
            'installation.stage.selandian',
            'installation.stage.danian',
            'installation.stage.maestrichtian',
            'installation.stage.campanian',
            'installation.stage.santonian',
            'installation.stage.coniacian',
            'installation.stage.turonian',
            'installation.stage.cenomanian',
            'installation.stage.albian',
            'installation.stage.aptian',
            'installation.stage.barremian',
            'installation.stage.hauterivian',
            'installation.stage.valanginian',
            'installation.stage.berriasian',
            'installation.stage.tithonian',
            'installation.stage.kimmeridgian',
            'installation.stage.oxfordian',
            'installation.stage.callovian',
            'installation.stage.bathonian',
            'installation.stage.bajocian',
            'installation.stage.aalenian',
            'installation.stage.toarcian',
            'installation.stage.pliensbachian',
            'installation.stage.sinemurian',
            'installation.stage.hettangian',
            'installation.stage.rhaetian',
            'installation.stage.norian',
            'installation.stage.carnian',
            'installation.stage.ladinian',
            'installation.stage.anisian',
            'installation.stage.olenekian',
            'installation.stage.induan',
            'installation.stage.changhsingian',
            'installation.stage.wuchiapingian',
            'installation.stage.capitanian',
            'installation.stage.wordian',
            'installation.stage.roadian',
            'installation.stage.kungurian',
            'installation.stage.artinskian',
            'installation.stage.sakmarian',
            'installation.stage.asselian',
            'installation.stage.gzhelian',
            'installation.stage.kasimovian',
            'installation.stage.moscovian',
            'installation.stage.bashkirian',
            'installation.stage.serpukhovian',
            'installation.stage.visean',
            'installation.stage.tournaisian',
            'installation.stage.famennian',
            'installation.stage.frasnian',
            'installation.stage.givetian',
            'installation.stage.eifelian',
            'installation.stage.emsian',
            'installation.stage.pratigian',
            'installation.stage.lochkovian',
            'installation.stage.pridoli',
            'installation.stage.ludfordian',
            'installation.stage.gorstian',
            'installation.stage.homerian',
            'installation.stage.sheinwoodian',
            'installation.stage.telychian',
            'installation.stage.aeronian',
            'installation.stage.rhuddanian',
            'installation.stage.hirnantian',
            'installation.stage.katian',
            'installation.stage.sandbian',
            'installation.stage.darriwilian',
            'installation.stage.dapingian',
            'installation.stage.floian',
            'installation.stage.tremadocian',
            'installation.stage.10thStage',
            'installation.stage.jiangshanian',
            'installation.stage.paibian',
            'installation.stage.guzhangian',
            'installation.stage.drumian',
            'installation.stage.wuliuan',
            'installation.stage.4thStage',
            'installation.stage.3rdStage',
            'installation.stage.2ndStage',
            'installation.stage.fortunian',
        ];
    }
}