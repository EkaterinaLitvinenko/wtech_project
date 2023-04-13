<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
            [
                'isbn' => '9788089913206',
                'title' => 'Demian',
                'description' => 'Túto knihu publikoval Hesse knižne v júni 1919 pod pseudonymom Emil Sinclair, pretože bol v Nemecku pre svoje protivojnové až pacifistické postoje počas vojny nežiaducim autorom. Po veľkom čitateľskom úspechu (8. dotlačí za pol roka) a uznanlivých recenziách kritiky získal aj Fontaneho cenu pre začínajúcich autorov. Následne priznáva autorstvo a kniha ďalej už vychádza s podtitulom ako naše súčasné vydanie. Už v roku 1925 vychádza 66. vydanie a už v roku 1947 presiahlo nemecké vydanie milión výtlačkov. V súčasnosti je kniha preložená do 28. jazykov. Tento román je príbehom priateľstva dvoch mladíkov v časoch pred nadchádzajúcou veľkou vojnou. Je aj príbehom hľadania nového, neskompromitovaného náboženstva a zmyslu života vôbec. Zo všetkých Hesseho kníh je Demian najviac ovplyvnený Jungovou psychológiou a symbolikou (Hesse bol Jungovým pacientom a neskôr aj priateľom). Veľký vplyv na text knihy mal aj psychoanalytik Josef B. Lang, dlhoročný Hesseho priateľ a terapeut, ktorý sa v knihe objavuje ako významná postava Pistorius. Publikácia obsahuje prvý raz slovensky publikovaný doslov Volkera Michelsa a vychádza v grafickej úprave Mareka Kianičku v luxusnej edícii Terra.',
                'price' => 15.99,
                'page_count' => 169,
                'genre_id' => 1,
                'language' => 'slovensky',
                'type' => 'pevna',
            ],
            [
                'isbn' => '9788082071552',
                'title' => 'Geniálna priateľka',
                'description' => 'Neapol na konci päťdesiatych rokov. Dve dievčatá vyrastajú vo svete chudoby a násilia, v uzavretom vesmíre, v ktorom je nutné prispôsobiť sa, dodržiavať pravidlá a zvyky, byť ako ostatní. Dve dievčatá, od začiatku iné, k sebe nachádzajú cestu, až sa stanú neoddeliteľnými.
                Elena je pekná a svetlovlasá. Učí sa, snaží sa každému vyhovieť, splniť, čo sa od nej čaká. Rebelantská Lila je tmavá zlá, ale nesmierne bystrá… priam geniálna. Nebojí sa nikoho a ničoho. Zo školy však odchádza pomáhať otcovi a bratovi v obuvníckej dielni. Naopak, Elena, ktorú podporuje učiteľka, pokračuje v štúdiu na gymnáziu ako deti z bohatších rodín, ktorých rodičia si to môžu dovoliť.
                
                Dievčatá sa menia navonok aj vo vnútri, ich cesty sa rozchádzajú a znovu krížia na pozadí živej, ale temnej a drsnej neapolskej štvrte. A tie cesty ich vedú k dospelosti. Detstvo nezostáva bez následkov, bez spomienok na túženie a utrpenie.',
                'price' => 16.99,
                'page_count' => 304,
                'genre_id' => 1,
                'language' => 'slovensky',
                'type' => 'pevna',
            ],
            [
                'isbn' => '9788082071842',
                'title' => 'Príbeh nového priezviska',
                'description' => 'Druhá kniha z Neapolskej ságy začína vo chvíli, keď Elena spolu so svojou „geniálnou priateľkou“ Lilou nechávajú za sebou svoje klaustrofobické dievčenstvo a vstupujú do sveta búrlivej mladej dospelosti, ktorú sprevádza láska, strata a zmätok. Na pozadí Neapola 60. a 70. rokov sa predtým nerozlučné priateľky vyberajú každá svojou cestou.

                Lila sa ako šestnásťročná vydala za bohatého Stefana Carraciho len, aby v svadobný večer zistila, že ju zradil, a tak ich manželstvo pochoval. Elena si naopak vybrala školu, netradičnejší spôsob, ako sa oslobodiť od dusivého života štvrti.
                
                Príbeh dvoch priateliek z neapolskej štvrte pokračuje. Elena a Lila majú dvadsať rokov. Lila je uväznená v tradičnom manželstve, zatiaľ čo Elena pokračuje na svojej ceste hľadania seba samej. Komplikovaný a meniaci sa vzťah medzi nimi ich často spája, ale aj rozdeľuje. Každá z nich sa ocitá na pomedzí bolestivého odporu a hlbokej lásky, ktorú k tej druhej cíti. Dievčatá dospievajú, sú z nich ženy, uprostred života ktorých stojí toto zvláštne a dokonale vykreslené priateľstvo.',
                'price' => 19.99,
                'page_count' => 400,
                'genre_id' => 1,
                'language' => 'slovensky',
                'type' => 'pevna',
            ],
            [
                'isbn' => '9788082072023',
                'title' => 'Tí, čo odchádzajú – tí, čo zostávajú',
                'description' => 'V tretej časti Neapolskej ságy sa z dievčat Eleny a Lily stávajú ženy. Lila, ktorá sa v šestnástich vydala, má malého syna, opustila manžela a výhody, ktoré jej prinášalo manželstvo, a pracuje ako robotníčka vo fabrike. Elena odišla zo štvrte, skončila vysokú školu a vydala úspešný román. Otvorili sa jej dvere do sveta vzdelaných ľudí. Obe ženy sa snažia prebúrať múry väzenia, ktorým je život v biede, nevedomosti a podriadení sa. Plávajú v mori príležitostí, ktoré priniesli sedemdesiate roky. A predsa ich stále spája silné puto, ktoré nemôžu preťať žiadne vonkajšie okolnosti. ',
                'price' => 19.99,
                'page_count' => 368,
                'genre_id' => 1,
                'language' => 'slovensky',
                'type' => 'pevna',
            ],
            [
                'isbn' => '9788082072047',
                'title' => 'Príbeh stratenej dcéry',
                'description' => 'Na pozadí Neapola, ktorý je tak zvodný, ako aj nebezpečný a radikálne sa meniaceho sveta, rozpráva Elena Ferrante s bezprecedentnou úprimnosťou a genialitou príbeh celoživotného priateľstva dvoch žien.

                Príbeh stratenej dcéry je záverečným dielom strhujúcej ságy o dvoch ženách – premýšľajúcej a vzdelanej Eleny a neskrotnej Lily. Obe sú dospelé, majú manželov, milencov, deti a starnúcich rodičov. Priateľstvo im slúžilo ako kotva v živote. Obe sa snažili uniknúť zo štvrte, v ktorej vyrástli – bola väzením konformity, násilia a neporušiteľných tabu. Elena sa vydala, odišla do Florencie a napísala niekoľko kníh. V záverečnej časti ju neviditeľná sila znovu ťahá do Neapola.',
                'price' => 19.99,
                'page_count' => 400,
                'genre_id' => 1,
                'language' => 'slovensky',
                'type' => 'pevna',
            ],
            [
                'isbn' => '9781784877989',
                'title' => 'Kafka on the Shore',
                'description' => 'Kafka Tamura runs away from home at fifteen, under the shadow of his fathers dark prophesy.

                The aging Nakata, tracker of lost cats, who never recovered from a bizarre childhood affliction, finds his pleasantly simplified life suddenly turned upside down.
                
                As their parallel odysseys unravel, cats converse with people; fish tumble from the sky; a ghost-like pimp deploys a Hegel-spouting girl of the night; a forest harbours soldiers apparently un-aged since World War II. There is a savage killing, but the identity of both victim and killer is a riddle - one of many which combine to create an elegant and dreamlike masterpiece.',
                'price' => 25.95,
                'page_count' => 528,
                'genre_id' => 1,
                'language' => 'anglicky',
                'type' => 'pevna',
            ],
            [
                'isbn' => '9788081501128',
                'title' => 'Veľký zošit, Dôkaz, Tretie klamstvo',
                'description' => 'Kto čo hovorí a čo je len napísané? Čo je skutočnosť a čo je lož? Existujú dvojičky, alebo len jedno dieťa? Kým Veľký zošit prekvapí svojím strohým no pôsobivým jazykom, Dôkaz spochybní to, čo sa udialo v prvej časti a čitateľ stratí akékoľvek oporné body a po prečítaní Veľkého klamstva sa všetko zjaví z celkom inej perspektívy. Mimoriadne silné dielo bolo preložené do viac ako tridsiatich jazykov, Veľký zošit bol sfilmovaný a získal Veľkú cenu Krištáľový glóbus na MMF Karlove Vary, Divadlo Andreja Bagara v marci 2016 uvádza dramatizáciu Veľkého zošita.',
                'price' => 16.95,
                'page_count' => 352,
                'genre_id' => 1,
                'language' => 'slovensky',
                'type' => 'pevna',
            ],
            [
                'isbn' => '9788056622483',
                'title' => 'Nezabudnite na veľrybu',
                'description' => 'Ak stratíte aj poslednú štipku nádeje, vždy je tu niekto, kto vám pomôže vidieť život inak.
                Keď nahého mladého muža vyplaví more na pláž pri mestečku St Piran v Cornwalle, rýchlo ho zachránia dedinčania. Od miestneho doktora na dôchodku a učiteľa, cez zberača odpadkov na pláži, majiteľa hostinca až po kňazovu ženu a románopisca, všetci prijmú túto stratenú dušu medzi seba. Dedinčania však nevedia, že Joe Haak ušiel zo City v Londýne v strachu pred celosvetovým kolapsom civilizácie, ktorý predpovedal jeho počítačový program Cassie. Je však koniec sveta naozaj blízko? Podarí sa Joeovi presvedčiť vidiečanov, aby sa uzavreli pred okolitým svetom ohrozeným epidémiou? A čo veľryba, ktorá sa vznáša v zátoke?',
                'price' => 14.99,
                'page_count' => 384,
                'genre_id' => 1,
                'language' => 'slovensky',
                'type' => 'pevna',
            ],
            [
                'isbn' => '9788055144092',
                'title' => 'Cestujem sama',
                'description' => 'Počas prechádzky sa mužovi z ničoho nič vytrhne pes a zmizne medzi stromami. Muž sa za ním rozbehne do hlbokého lesa a tam sa mu naskytne otrasný pohľad. Na strome visí obesené dievčatko, odeté ako bábika. Na chrbte má školskú aktovku a okolo krku priviazanú tabuľku s nápisom Cestujem sama.
                Prípadu sa ujme policajný vyšetrovateľ Holger Munch a veľmi rýchlo pochopí, že bude potrebovať pomoc bývalej kolegyne Mie Krügerovej. Len ona dokáže spozorovať stopy, ktoré všetkým naokolo unikajú. Lenže Mia, kedysi energická a plná života, má vážne psychické problémy. Holger Munch sa ju rozhodne vyhľadať a presvedčiť, aby mu pomohla s vyšetrovaním. Ani jeden z nich však ešte netuší, že tento prípad sa rýchlo zmení na najhoršiu nočnú moru.',
                'price' => 15.90,
                'page_count' => 464,
                'genre_id' => 2,
                'language' => 'slovensky',
                'type' => 'pevna'
            ],
            [
                'isbn' => '9781787460614',
                'title' => 'Mindhunter',
                'description' => 'FBI Special Agent and expert in criminal profiling and behavioural science, John Douglas, is a man who has looked evil in the eye and made a vocation of understanding it. Now retired, Douglas can let us inside the FBI elite serial crime unit and into the disturbed minds of some of the most savage serial killers in the world. The man who was the inspiration for Special Agent Jack Crawford in The Silence of the Lambs and who lent the film makers his expertise explains how he invented and established the practice of criminal profiling; what it was like to submerge himself mentally in the world of serial killers to the point of becoming both perpetrator and victim; and individual case histories including those of Jeffrey Dahmer, Charles Manson, Ted Bundy and the Atlanta child murders. With the fierce page-turning power of a bestselling novel, yet terrifyingly true, Mindhunter is a true crime classic.',
                'price' => 12.50,
                'page_count' => 448,
                'genre_id' => 2,
                'language' => 'anglicky',
                'type' => 'brozovana'
            ],
            [
                'isbn' => '9780241988268',
                'title' => 'The Thursday Murder Club',
                'description' => 'In a peaceful retirement village, four unlikely friends meet up once a week to investigate unsolved murders. But when a brutal killing takes place on their very doorstep, the Thursday Murder Club find themselves in the middle of their first live case. Elizabeth, Joyce, Ibrahim and Ron might be pushing eighty but they still have a few tricks up their sleeves. Can our unorthodox but brilliant gang catch the killer before it is too late?',
                'price' => 9.20,
                'page_count' => 400,
                'genre_id' => 2,
                'language' => 'anglicky',
                'type' => 'brozovana'
            ],
            [
                'isbn' => '9780241425435',
                'title' => 'The Man Who Died Twice',
                'description' => 'It is the following Thursday, and Elizabeth has just had a visit from a man she thought was dead. It is (one of) her ex-husbands, and he is being hunted. His story involves some diamonds, some spies, and a very angry mobster.

                Elizabeth puts it down to his normal grandstanding, but then the bodies start piling up. So she enlists Joyce, Ibrahim and Ron in the hunt for the killer. If they find the diamonds - well, that is just a bonus...
                
                But this time the murderer is not some small-time criminal, and it soon becomes terrifying clear that they would not bat an eyelid at killing four septuagenarians. Can our team find the killer before the killer finds them?',
                'price' => 18.75,
                'page_count' => 336,
                'genre_id' => 2,
                'language' => 'anglicky',
                'type' => 'brozovana'
            ],
            [
                'isbn' => '9780241512432',
                'title' => 'The Bullet that Missed',
                'description' => 'It is an ordinary Thursday, and things should finally be returning to normal. Except trouble is never far away where the Thursday Murder Club are concerned. A local news legend is on the hunt for a sensational headline, and soon the gang are hot on the trail of two murders, ten years apart.

                To make matters worse, a new nemesis pays Elizabeth a visit, presenting her with a deadly mission: kill or be killed…
                
                While Elizabeth grapples with her conscience (and a gun), the gang and their unlikely new friends (including TV stars, money launderers and ex-KGB colonels) unravel a new mystery. But can they catch the culprit and save Elizabeth before the murderer strikes again?',
                'price' => 18.50,
                'page_count' => 400,
                'genre_id' => 2,
                'language' => 'anglicky',
                'type' => 'brozovana'
            ],
            [
                'isbn' => '9788055642987',
                'title' => 'Dobré znamenia',
                'description' => 'Koniec sveta sa nezadržateľne blíži. Zhromažďujú sa armády dobra a zla, z hlbín sa dvíha Atlantída, z neba padajú žaby, naplno horia vášne. Zdá sa, že všetko ide presne podľa Božieho plánu. Démon Crowley a anjel Azirafal už dlho žijú na zemi medzi smrteľníkmi a celkom si tu zvykli. Ak si chcú zachovať svoj pohodlný životný štýl, neostáva im nič iné, len odvrátiť hroziaci armagedon. Najprv však budú musieť nájsť nezvestného Antikrista.',
                'price' => 16.95,
                'page_count' => 400,
                'genre_id' => 3,
                'language' => 'slovensky',
                'type' => 'pevna'
            ],
            [
                'isbn' => '9788055606347',
                'title' => 'Pán prsteňov I. - Spoločenstvo prsteňa',
                'description' => 'Tento príbeh narastal pri rozprávaní, až sa stal dejinami Veľkej vojny o Prsteň a obsahuje mnoho pohľadov do ešte starodávnejších dejín, ktoré mu predchádzali - napísal v predslove k druhému vydaniu J. R. R. Tolkien o tejto vari najznámejšej knižnej trilógii minulého storočia. Čarovný svet elfov a hobitov je paralelným svetom ""veľkých ľudí"". Jeho hlavnou témou je Prsteň ako ohnivko, ktoré ho púta k Hobitovi. Proti akýmkoľvek alegóriám sa autor bránil a všetky možné posolstvá a vnútorné významy spájané s jeho knihou sa mu zo srdca protivili. Preto je túto knihu potrebné chápať ako najobľúbenejšie dejiny pradávneho veku a nijako inak.',
                'price' => 19.95,
                'page_count' => 456,
                'genre_id' => 3,
                'language' => 'slovensky',
                'type' => 'pevna'
            ],
            [
                'isbn' => '9788055606323',
                'title' => 'Pán prsteňov II. - Dve veže',
                'description' => 'Pán prsteňov je dielo, ktoré sa v uplynulých desaťročiach dočkalo desiatok vydaní na celom svete. Dramatický a spletitý príbeh o čarovnom Prsteni si získal milióny čitateľov a popredné miesto v klasickom fonde svetovej fantastickej literatúry. Tolkienov rozprávačský talent a záujem o mytológiu vytvoril neuveriteľný svet fantázie, schopný vtiahnuť do svojho deja mladých i dospelých milovníkov čarovných príbehov o rozprávkových bytostiach z tajomných končín krajiny Stredozeme, ktorej existencia je ohrozená rozpínajúcim sa zlom. Dve veže sú pokračovaním príbehu po rozpade Spoločenstva Prsteňa.',
                'price' => 19.95,
                'page_count' => 376,
                'genre_id' => 3,
                'language' => 'slovensky',
                'type' => 'pevna'
            ],
            [
                'isbn' => '9788055606309',
                'title' => 'Pán prsteňov III. - Návrat kráľa',
                'description' => 'Pán prsteňov je rozprávkovou históriou Vojny o Prsteň, rozprávaním o boji slobodných národov Stredozeme proti Tieňu a o putovaní Hobita Froda, ktorý sa vyberie zachrániť svet. Po rozbití Spoločenstva Prsteňa a príchode Veľkej tmy začína Vojna o Prsteň, ktorá má rozhodnúť o všetkom...',
                'price' => 19.95,
                'page_count' => 432,
                'genre_id' => 3,
                'language' => 'slovensky',
                'type' => 'pevna'
            ],
            [
                'isbn' => '9788022209892',
                'title' => 'Oheň a krv',
                'description' => 'Toto je prvý zväzok úplných dvojzväzkových dejín rodu Targaryenovcov v Západnej zemi a prináša oheň i besnenie, aké fanúšikovia očakávajú od medzinárodne úspešného autora Georgea R.R. Martina. Stáročia pred udalosťami opísanými v Hre o tróny sa Targaryenovci, jediný rod dračích pánov, ktorý prežil Skazu Valýrie, usadili na Dračom kameni. Dejiny Ohňa a krvi sa začínajú príbehom legendárneho Aegona Dobyvateľa, ktorý dal zhotoviť kultový Železný trón, a pokračujú rozprávaním o nasledujúcich pokoleniach Targaryenovcov, ktoré sa snažili udržať si ho, až po občiansku vojnu, ktorá takmer rozoštvala ich dynastiu.
                Čo sa skutočne stalo počas Tanca drakov? Prečo bola cesta do Valýrie po Skaze smrteľne nebezpečná? Aké hrozné zločiny spáchal Maegor Krutý? Ako to vyzeralo v Západnej zemi, keď oblohe kraľovali draky? To je len zopár otázok, ktoré zodpovie táto vyčerpávajúca kronika, spísaná učeným majstrom z Citadely.',
                'price' => 29.90,
                'page_count' => 568,
                'genre_id' => 3,
                'language' => 'slovensky',
                'type' => 'pevna'
            ],
            [
                'isbn' => '9788055630380',
                'title' => 'Vrania šestka',
                'description' => 'Vrania šestka – to je šesť zúfalých a pokútnych indivíduí: trestanec (čo prahne po pomste), ostrostrelec (ktorý neodolá žiadnej stávke), zbeh (čo zutekal pred životom v luxuse jednej z najbohatších rodín), špiónka (známa ako Prízrak), lámačka (čo sa pretĺka spodinou sveta pomocou mágie) a zlodej (s darom vyviaznuť živý zovšadiaľ). Najali ich na pochybnú lúpež storočia. Ich úloha je celkom jednoduchá. Vlámať sa na Ľadový dvor a oslobodiť jedného väzňa. Až na to, že Ľadový dvor je nedobytná vojenská pevnosť, ktorú zatiaľ nikto, ale naozaj nikto nezdolal.
                Väzňom je známy vedec, ktorý dokáže šmahom ruky rozpútať magickú spúšť v celom známom svete. A členovia Vranej šestky musia prežiť dosť dlho, aby si vyzdvihli (a potom aj minuli) svoju nepredstaviteľnú finančnú odmenu. Vrania šestka je nezastaviteľná, ak sa len Kaz, Inej, Jesper, Nina, Matthias a Wylan nepozabíjajú navzájom skôr, než vstanú od stola.',
                'price' => 11.95,
                'page_count' => 488,
                'genre_id' => 3,
                'language' => 'slovensky',
                'type' => 'brozovana'
            ],
            [
                'isbn' => '9781408891384',
                'title' => 'The Song of Achilles',
                'description' => 'The legend begins... Greece in the age of heroes. Patroclus, an awkward young prince, has been exiled to the kingdom of Phthia to be raised in the shadow of King Peleus and his golden son, Achilles. “The best of all the Greeks” strong, beautiful, and the child of a goddess Achilles is everything the shamed Patroclus is not. Yet despite their differences, the boys become steadfast companions. Their bond deepens as they grow into young men and become skilled in the arts of war and medicine much to the displeasure and the fury of Achilles mother, Thetis, a cruel sea goddess with a hatred of mortals. When word comes that Helen of Sparta has been kidnapped, the men of Greece, bound by blood and oath, must lay siege to Troy in her name. Seduced by the promise of a glorious destiny, Achilles joins their cause, and torn between love and fear for his friend, Patroclus follows. Little do they know that the Fates will test them both as never.',
                'price' => 24.50,
                'page_count' => 484,
                'genre_id' => 4,
                'language' => 'anglicky',
                'type' => 'pevna'
            ],
            [
                'isbn' => '9788055151885',
                'title' => 'Mengeleho dievča',
                'description' => 'Každý večer, keď myslím na svojich drahých, ktorí už nežijú, si hovorím: Ako si to mohla prežiť? Sama neviem. Bolo to naozaj iba o šťastí a náhode


                To sú slová Violy Fischerovej, ženy, ktorá prežila Mengeleho pokusy, štyri koncentračné tábory a nakoniec nacistom utiekla.
                Tá hrozná doba stvorila množstvo príbehov. Príbehov o odvahe, statočnosti, láskavosti a obetovaní sa, ale aj o zlobe, podlosti a obludnom ponižovaní iných ľudských bytostí. Príbeh Violy Fischerovej je však výnimočný. Ona totiž okrem toho, že prežila peklo táborov smrti a našla v sebe silu na riskantný útek, dokázala ešte niečo. Vďaka nej chytili brutálnu dozorkyňu z Birkenau.
                Po vojne sa náhodou stretla so svojou veľkou láskou. Mužom, o ktorom roky nevedela, či ešte žije. Ale nakoniec sa vydala za niekoho iného. Rytiera. Skutočného novodobého rytiera, ktorý získal toto vyznamenanie od francúzskeho prezidenta za statočnosť v boji na strane Spojencov.
                Viola Fischerová po rokoch zverila svoje spomienky reportérke Veronike Homolovej Tóthovej. Táto kniha zaznamenáva jej osud i osudy iných ľudí, ktoré by nemali upadnúť do zabudnutia.',
                'price' => 15.90,
                'page_count' => 368,
                'genre_id' => 4,
                'language' => 'slovensky',
                'type' => 'pevna'
            ],
            [
                'isbn' => '9780099532811',
                'title' => 'All Quiet on the Western Front',
                'description' => 'One by one the boys begin to fall... In 1914, a room full of German schoolboys, fresh-faced and idealistic, are goaded by their schoolmaster to troop off to the glorious war. With the fire and patriotism of youth, they sign up. What follows is the moving story of a young unknown soldier experiencing the horror and disillusionment of life in the trenches.',
                'price' => 11.95,
                'page_count' => 224,
                'genre_id' => 4,
                'language' => 'anglicky',
                'type' => 'brozovana'
            ],
            [
                'isbn' => '9788055180892',
                'title' => 'Zlodejka kníh',
                'description' => 'Liesel Memingerová prichádza do nemeckého mestečka Molching, kde ju čakajú adoptívni rodičia. Postupne si zvyká na krik a výčitky novej mamy Rosy i na láskavosť nového ocka Hansa. Liesel si nachádza priateľov – aj toho najlepšieho, ktorý sa do nej zaľúbi. Zoznamuje sa so slovami, učí sa ich čítať i zapisovať. Počúva hudbu, ktorou jej ocko obveseľuje mestečko. A hoci by to od nej asi nik nečakal, kradne knihy.
                Na všetko, čo vnímavá Liesel prežíva, však dopadá tieň Adolfa Hitlera, ktorý vládne Nemecku a nepochybne aj srdciam väčšiny jeho obyvateľov. Jej ocko nacistickému poblázneniu odolal a Liesel sa čoskoro naučí rozlišovať medzi svetom „tam vonku“, kde treba na požiadanie hajlovať či vešať zástavy so svastikami, a svetom „vnútri“, v dome, kde sa v pivnici ukrýva mladý židovský utečenec.
                Blíži sa koniec vojny, život je čoraz ťažší a Smrť, rozprávač strhujúceho príbehu Liesel Memingerovej, má čoraz viac práce. Jeho pohľad sprevádza čitateľov od prvej stránky po poslednú a prifarbuje ju melanchóliou i čiernym humorom.',
                'price' => 15.90,
                'page_count' => 480,
                'genre_id' => 4,
                'language' => 'slovensky',
                'type' => 'pevna'
            ],
            [
                'isbn' => '9788055135083',
                'title' => 'Storočný starček, ktorý vyliezol z okna a zmizol',
                'description' => 'Mysleli by ste si, že sa mohol rozhodnúť skôr a mal byť natoľko chlap, aby svoje rozhodnutie oznámil okoliu. Ale Allan Karlsson nikdy dlho o veciach nemudroval. Myšlienka sa ani nestihla usadiť v hlave starého muža a už otváral okno svojej izby na prízemí domova dôchodcov v sörmländskom Malmköpingu a vykročil rovno do záhonu. Pohyb mu vyšiel a nebolo to ani komplikované napriek tomu, že Allan sa práve dnes dožil sto rokov. V spoločenskej miestnosti domova dôchodcov sa asi tak o hodinu mala začať narodeninová oslava. Mal sa nej zúčastniť sám starosta. A miestna tlač. A všetci ostatní starčekovia. A všetok personál na čele s večne mrzutou sestrou Alice. Iba sám oslávenec sa tam nemienil ukázať.',
                'price' => 13.90,
                'page_count' => 328,
                'genre_id' => 5,
                'language' => 'slovensky',
                'type' => 'pevna',
            ],
            [
                'isbn' => '9788055120065',
                'title' => 'O nákazlivosti šťastia',
                'description' => 'Spisovateľ, básnik a prekladateľ Ľubomír Feldek sa v poslednom čase úspešne prezentuje v tlači ako publicista. Knižka je výberom z jeho čitateľsky úspešných, prevažne humorných fejtónov uverejňovaných v rôznych periodikách. Medzi inými obsahuje texty ako O kráse Sloveniek, O zaslúžilých zásluhách...',
                'price' => 7.90,
                'page_count' => 184,
                'genre_id' => 5,
                'language' => 'slovensky',
                'type' => 'brozovana',
            ],
            [
                'isbn' => '9788055642949',
                'title' => 'Hlava XXII',
                'description' => 'Román Hlava XXII je jedným z najdôležitejších protivojnových diel, ktoré vyšli po druhej svetovej vojne. Autor opisuje márny boj hlavného hrdinu Yossariana proti absurdnej vojenskej mašinérii, pričom hojne využíva čierny humor a neustále balansuje medzi komikou a hororom. Názov knihy odkazuje na vojenský predpis, podľa ktorého vojakov s istým počtom náletov odvelia z vojny, no zároveň nariaďuje, že vojak musí za každých okolností poslúchnuť svojho nadriadeného a plukovníci neustále zvyšujú počet náletov.',
                'price' => 13.95,
                'page_count' => 408,
                'genre_id' => 5,
                'language' => 'slovensky',
                'type' => 'pevna',
            ],
            [
                'isbn' => '9788055170817',
                'title' => 'Obhliadka bytu',
                'description' => 'Stačí jediný naozaj, ale naozaj zlý nápad. Viac netreba. Pri obhliadke bytu sa nešikovný a neúspešný bankový lupič zamkne s premotivovanou realitnou maklérkou, s dvoma notorickými obdivovateľmi Ikey, s nepríjemnou multimilionárkou, so smutnou starou dámou, so ženou vo vysokom štádiu tehotenstva, s neznesiteľným starým dudrošom, s králičou hlavou – a neuveriteľne bláznivá tragikomická rukojemnícka dráma je na svete! Lupič sa nakoniec vzdá a rukojemníkov prepustí, ale keď do bytu vtrhnú policajti, nájdu ho prázdny. Pri následných svojských výsluchoch svedkov spoznávame ich pozoruhodné verzie a názory na to, čo sa v skutočnosti stalo. Z výpovedí pripomínajúcich komplikovanú skladačku vyplynie niekoľko otázok: Ako sa lupičovi podarilo uniknúť? Prečo sú všetci rukojemníci uštipační, nevrlí a zlostní? Čo sa to vlastne deje s ľuďmi?',
                'price' => 13.90,
                'page_count' => 336,
                'genre_id' => 5,
                'language' => 'slovensky',
                'type' => 'pevna',
            ],
            [
                'isbn' => '9788055175034',
                'title' => 'Denník odvážneho bojka 1',
                'description' => 'Jedného dňa určite budem slávny, ale zatiaľ musím trčať v škole s bandou idiotov. Život jedenásťročného decka môže byť fakt nafigu. Greg Heffley o tom vie svoje, lebo sa zrazu ocitol na škole, kde musí prežiť medzi chalanmi, ktorí sú vyšší, zlomyseľnejší a už im rastú fúzy.',
                'price' => 11.90,
                'page_count' => 224,
                'genre_id' => 6,
                'language' => 'slovensky',
                'type' => 'pevna'
            ],
            [
                'isbn' => '9788056613474',
                'title' => 'Noc chodiacich múmií',
                'description' => 'Do mesta príde veľká výstava egyptských múmií. Deň pred jej otvorením sa do múzea vkradnú členovia Klubu záhad a odhalia desivú skutočnosť: jedna z múmií ožije. Jej dotyk má hrôzostrašné následky. Prvou obeťou sa stane Vicky, ktorá čoskoro pocíti suchý, chladný dotyk mumifikovaných rúk.',
                'price' => 7.99,
                'page_count' => 128,
                'genre_id' => 6,
                'language' => 'slovensky',
                'type' => 'pevna'
            ],
            [
                'isbn' => '8071811831',
                'title' => 'Rozprávanie o psíkovi a mačičke',
                'description' => 'Kedysi, keď psík a mačička ešte spolu gazdovali, mali pri lese malý domček, v ktorom spolu bývali a chceli robiť všetko tak, ako to robia ľudia. Ale vždy to tak nevedeli, pretože mali malé, nešikovné labky, a na tých labkách nemali prsty, ako majú ľudia, iba také malé vankúšiky a na nich pazúriky. Ako sa im spolu vodilo?',
                'price' => 6.99,
                'page_count' => 111,
                'genre_id' => 6,
                'language' => 'slovensky',
                'type' => 'pevna'
            ],
            [
                'isbn' => '9788080859190',
                'title' => 'Medvedík Pú',
                'description' => 'Pôvabná rozprávková knižka o príhodách malého medvedíka a jeho priateľov s pôvodnými ilustráciami E. H. Sheparda. Kniha Medvedík Pú dostala cenu Najčítanejšia detská kniha.',
                'price' => 12.95,
                'page_count' => 302,
                'genre_id' => 6,
                'language' => 'slovensky',
                'type' => 'pevna'
            ],
            [
                'isbn' => '9788010034666',
                'title' => 'Malý princ',
                'description' => 'Pôvabná knižka nielen pre deti, ale pre všetkých, ktorí chcú deťom porozumieť. Toto dielko dosiahlo svetový úspech a patrí do zlatého fondu svetovej literatúry. Jeho hodnota a krása nespočíva len v peknom rozprávkovom príbehu, ale hlavne v myšlienkach, ktoré ako vzácne kamienky vytvárajú obraz ľudských vlastností...',
                'price' => 5.50,
                'page_count' => 96,
                'genre_id' => 6,
                'language' => 'slovensky',
                'type' => 'pevna'
            ],
            [
                'isbn' => '9788055607924',
                'title' => 'Brooklyn',
                'description' => 'Eilis Laceyová vyrastala v malom írskom mestečku, v ťažkých rokoch po druhej svetovej vojne. Keď jej otec Flood z farnosti v Brooklyne ponúkne možnosť odísť do Spojených štátov, Eilis sa rozhodne vycestovať, a tak sa stane jednou z mnohých írskych emigrantov v USA. V Brooklyne si dokončí účtovnícku kvalifikáciu, nájde si prácu v obchodnom dome Bartocci´s, a keď to Eilis najmenej čaká, aj lásku.

                Nové „americké“ Írsko je však iné ako to pravé doma, medziľudským vzťahom chýba niečo osobné, prirodzené a nezištné. Zemepisná vzdialenosť, čo delí Eilis od jej najbližších v rodnej zemi, je neporovnateľne menšia než úmyselne zatajené rodinné tajomstvá.',
                'price' => 12.95,
                'page_count' => 272,
                'genre_id' => 7,
                'language' => 'slovensky',
                'type' => 'pevna'
            ],
            [
                'isbn' => '9788055171500',
                'title' => 'Malé ženy',
                'description' => 'Príbeh sa odohráva v časoch americkej občianskej vojny v rokoch 1861 – 1865, do ktorej narukoval aj otec rodiny Marchovcov. Jeho manželka a dcéry prežívajú neľahké obdobie sprevádzané chudobou, chorobami a mnohými inými problémami. Bezstarostné dievčatá sa za krátky čas menia na skutočné malé ženy schopné čeliť aj ťažkým výzvam s odvahou a odhodlaním. Romantická Meg, neskrotná Jo, krehká Beth a rozmaznaná Amy sú hrdinkami z mäsa a kostí, ktoré inšpirovali milióny čitateľov.',
                'price' => 17.90,
                'page_count' => 576,
                'genre_id' => 7,
                'language' => 'slovensky',
                'type' => 'pevna'
            ],
            [
                'isbn' => '1588581154814',
                'title' => 'Once Upon A Broken Heart',
                'description' => 'For as long as she can remember, Evangeline Fox has believed in happily ever after. Until she learns that the love of her life is about to marry another, and her dreams are shattered.

                Desperate to stop the wedding, and heal her wounded heart, Evangeline strikes a deal with the charismatic, but wicked, Prince of Hearts. In exchange for his help, he asks for three kisses, to be given at the time and place of his choosing.
                
                But after Evangelines first promised kiss, she learns that bargaining with an immortal is a dangerous game - and that the Prince of Hearts wants far more from her than she pledged. He has plans for Evangeline, plans that will either end in the greatest happily ever after, or the most exquisite tragedy...',
                'price' => 11.95,
                'page_count' => 416,
                'genre_id' => 7,
                'language' => 'anglicky',
                'type' => 'brozovana'
            ],
            [
                'isbn' => '9781529099119',
                'title' => 'Scattered Showers',
                'description' => 'Girl meets boy camping outside a movie theater. Best friends debate the merits of high school dances. A prince romances a troll. A girl romances an imaginary boy. And Simon Snow himself returns for a holiday adventure. It’s a feast of irresistible characters, hilarious dialogue, and masterful storytelling, in short, everything you’d expect from a Rainbow Rowell book.',
                'price' => 21.50,
                'page_count' => 288,
                'genre_id' => 7,
                'language' => 'anglicky',
                'type' => 'pevna'
            ],
            [
                'isbn' => '9788055623733',
                'title' => 'Bitúnok č. 5',
                'description' => 'Kurt Vonnegut je pokračovateľom veľkých satirikov ako Jonathan Swift alebo Samuel Butler. Spolu s Rayom Bradburym patrí k spisovateľom, pre ktorých je žáner science-fiction predovšetkým príležitosťou odhaľovať pravdu o našom živote a konaní. S postupujúcim vekom sa u Vonneguta čoraz výraznejšie dostávajú do popredia prvky reflexívne a autobiografické. Ako iní veľkí tvorcovia, aj on stiera rozdiel medzi vlastným súkromím a údelom svojho epického hrdinu, voľne splieta obe vetvy rozprávania a dosahuje tak osobitný účinok. V románe Bitúnok č. 5 opísal jeden z kľúčových zážitkov svojho života – bombardovanie Drážďan v roku 1945. Tak vzniká jedno z najoriginálnejších protivojnových diel, v ktorom hlavnú postavu predstavuje Billy Pilgrim, mladý Američan s nemeckými koreňmi, ktorý sa dostáva do nemeckého zajatia.',
                'price' => 11.95,
                'page_count' => 168,
                'genre_id' => 8,
                'language' => 'slovensky',
                'type' => 'pevna'
            ],
            [
                'isbn' => '9780099518471',
                'title' => 'Brave New World',
                'description' => 'Fifteenth-century Constantinople. Present day Idaho. The future, and humanitys last hope.

                Across time and space, five young dreamers are bound by a single ancient text. Together, they tell a story of a world in peril; of the power of words, of resilience, and of hope against all odds. The Pulitzer Prize-winning author of All the Light We Cannot See returns with a heart-breaking, magnificent epic of human connection and a love letter to storytelling itself.',
                'price' => 9.95,
                'page_count' => 288,
                'genre_id' => 8,
                'language' => 'anglicky',
                'type' => 'brozovana'
            ],
            [
                'isbn' => '9780008478674',
                'title' => 'Cloud Cuckoo Land',
                'description' => 'Fifteenth-century Constantinople. Present day Idaho. The future, and humanitys last hope.

                Across time and space, five young dreamers are bound by a single ancient text. Together, they tell a story of a world in peril; of the power of words, of resilience, and of hope against all odds. The Pulitzer Prize-winning author of All the Light We Cannot See returns with a heart-breaking, magnificent epic of human connection and a love letter to storytelling itself.',
                'price' => 12.95,
                'page_count' => 592,
                'genre_id' => 8,
                'language' => 'anglicky',
                'type' => 'brozovana'
            ],
            [
                'isbn' => '9780006546061',
                'title' => 'Fahrenheit 451',
                'description' => 'The hauntingly prophetic classic novel set in a not-too-distant future where books are burned by a special task force of firemen. Guy Montag is a fireman. His job is to burn books, which are forbidden, being the source of all discord and unhappiness. Even so, Montag is unhappy; there is discord in his marriage. Are books hidden in his house? The Mechanical Hound of the Fire Department, armed with a lethal hypodermic, escorted by helicopters, is ready to track down those dissidents who defy society to preserve and read books. The classic novel of a post-literate future, Fahrenheit 451 stands alongside Orwells 1984 and Huxleys Brave New World as a prophetic account of Western civilizations enslavement by the media, drugs and conformity.',
                'price' => 9.50,
                'page_count' => 227,
                'genre_id' => 8,
                'language' => 'anglicky',
                'type' => 'brozovana'
            ],
            [
                'isbn' => '8607235478534',
                'title' => 'Qualityland',
                'description' => 'WELCOME TO QUALITYLAND
                This book is for you. Yes, you specifically.
                
                We hope you enjoy your trip to the happiest, most advanced place on earth.
                QualityLand is the worlds first 2.0 country, where everything is run by infallible algorithm.
                
                In fact, this very algorithm selected you to visit QualityLand. If you do not like it, you are not just ungrateful - you are also wrong, because the algorithm is always right.
                
                While you are visiting, be aware there is an election going on - the perfect time to see QualityLand in action...',
                'price' => 11.50,
                'page_count' => 352,
                'genre_id' => 8,
                'language' => 'anglicky',
                'type' => 'brozovana'
            ],
            [
                'isbn' => '9788055118864',
                'title' => 'Dievča, ktoré sa hralo s ohňom',
                'description' => 'V druhej časti úspešnej trilógie Millennium (prvá časť Muži, ktorí nenávidia ženy) obvinia Lisbeth Salanderovú z trojitej vraždy. Stáva sa súčasťou kolotoča, ktorý siaha hlboko do jej temnej minulosti...',
                'price' => 16.90,
                'page_count' => 472,
                'genre_id' => 2,
                'language' => 'slovensky',
                'type' => 'pevna'
            ],
            [
                'isbn' => '9781435140370',
                'title' => 'Great Tales of Horror',
                'description' => 'H.P. Lovecraft: Great Tales of Horror features twenty of horror master H.P. Lovecrafts classic stories, among them some of the greatest works of horror fiction ever written, including: "The Rats in the Walls," "Pickmans Model," "The Colour out of Space," "The Call of Cthulhu," "The Dunwich Horror," "The Shadow over Innsmouth," "At the Mountains of Madness," "The Shadow out of Time," and "The Haunter of the Dark."',
                'price' => 15.95,
                'page_count' => 600,
                'genre_id' => 2,
                'language' => 'anglicky',
                'type' => 'pevna'
            ],
            [
                'isbn' => '8055117638',
                'title' => 'Muži, ktorí nenávidia ženy',
                'description' => 'Novinár Mikael Blomkvist je odsúdený za ohováranie významného švédskeho podnikateľa a snaží sa uniknúť pozornosti médií hlavného mesta. Priemyselný magnát Henrik Vanger, žijúci v severnom Švédsku, ho poverí úlohou napísať kroniku svojej rodiny, ktorou v skutočnosti sleduje jediný cieľ: objasniť záhadné zmiznutie svojej netere Harriet v lete 1966. Blomkvist pri písaní kroniky, aj s pomocou geniálnej hackerky Lisbeth Salanderovej, čoraz hlbšie preniká do záhad rodiny a odhaľuje pravdu o mužoch, ktorí nenávidia ženy.',
                'price' => 16.90,
                'page_count' => 423,
                'genre_id' => 2,
                'language' => 'slovensky',
                'type' => 'pevna'
            ],
            [
                'isbn' => '9788022206006',
                'title' => 'Vtedy v lese',
                'description' => 'Na oltári z doby bronzovej, objavenom na posvätnom mieste v Knocknaree, sa nájde mŕtve dieťa. Je to talentovaná balerína, dcéra muža, ktorý vedie kampaň proti diaľnici, naplánovanej cez vzácne archeologické nálezisko. Policajt – rozprávač prežil iné nevyriešené zmiznutie v lete roku 1984, čo lesu dodáva desivo klamlivé čaro. K tomu pristupujú politické ťahanice, posvätná hrdosť detektívnych partnerov, rodina, v ktorej niečo fakt smrdí, čudná partia archeológov a príšerný, strašidelný les.',
                'price' => 8.90,
                'page_count' => 414,
                'genre_id' => 2,
                'language' => 'slovensky',
                'type' => 'pevna'
            ],
            [
                'isbn' => '9930059900595',
                'title' => 'Aristotle and Dante Discover the Secrets of the Universe',
                'description' => 'Aristotle is an angry teen with a brother in prison.

                Dante is a know-it-all who has a unique perspective on life.
                
                When the two meet at the swimming pool, they seem to have nothing in common. But as the loners start spending time together, they develop a special friendship - the kind that changes lives and lasts a lifetime. And it is through this friendship that Ari and Dante will learn the most important truths about the universe, themselves and the kind of people they want to be.
                
                This incredibly moving and powerful Printz Honor Book follows two teen boys learning to open themselves up to love, despite the world being against them.',
                'price' => 12.95,
                'page_count' => 368,
                'genre_id' => 10,
                'language' => 'anglicky',
                'type' => 'brozovana'
            ],
            [
                'isbn' => '8938398938394',
                'title' => 'Aristotle and Dante Dive Into the Waters of the World',
                'description' => 'Ari has spent all of high school hiding who he really is, staying silent and invisible. He expected his senior year to be the same. But something in him cracked open when he fell in love with Dante, and he can’t go back. Suddenly he finds himself reaching out to new friends, standing up to bullies and making his voice heard. And, always, there is Dante – dreamy, witty Dante – who can get on Ari’s nerves and fill him with desire all at once.
                The boys are determined to forge a path for themselves in a world that doesn’t understand them. But when Ari is faced with a shocking loss, he’ll have to fight like never before to create a life that is truthfully, joyfully his own.',
                'price' => 12.34,
                'page_count' => 368,
                'genre_id' => 10,
                'language' => 'anglicky',
                'type' => 'brozovana'
            ],
            [
                'isbn' => '9788055140469',
                'title' => 'Eleanor a Park',
                'description' => 'Obaja majú šestnásť, sú spolužiaci a sú úplne iní ako ostatní.

                Eleanor
                Červenovláska z chudobnej rodiny. V jednej izbe sa tlačí so štyrmi súrodencami. S nevlastným otcom sa neznáša pre jeho násilnícke sklony. V škole je nová a nepatrí k obľúbencom – nenosí značkové oblečenie, lebo jej rodičia na to nemajú, nie je štíhla ako spolužiačky a na jej vtipných hláškach sa nikto nesmeje.
                
                Park
                Jeho rodina netrpí núdzou, ale Park nemá rád sám seba. Chýbajú mu svaly bejzbalistu, výška basketbalistu a sebavedomie amerického tínedžera z nebraskej Omahy. Parkovu matku si totiž otec priviedol z Kórey a syn zdedil jej ázijské črty. A tak si najradšej číta komiksy, počúva obľúbenú hudbu a v školskom autobuse sedí sám.
                Až kým jedného dňa nenastúpi istá červenovláska a nikto – okrem neho – ju k sebe nepustí sadnúť.
                Eleanor a Park nie sú hlúpi a vedia, že prvá láska takmer nikdy nevydrží. Sú však aj dosť zúfalí a dosť odvážni, a tak to spolu skúsia...',
                'price' => 9.90,
                'page_count' => 336,
                'genre_id' => 10,
                'language' => 'slovensky',
                'type' => 'brozovana'
            ],
            [
                'isbn' => '9788055142623',
                'title' => 'Fanúšička',
                'description' => 'Cath je fanúšička seriálového hrdinu Simona Snowa.
                Jasné, celý svet zbožňuje Simona Snowa... Ale Cath je fanúšičkou celý svoj život a je v tom fakt dobrá. So sestrou dvojčaťom Wren sa ešte ako deti ukryli v Simonovom svete a pomohlo im to zvládnuť matkin odchod. Čítanie. Druhé čítanie. Vypisovanie na fanúšikovské fóra, písanie fanfiction, prezliekanie sa za postavy na každú filmovú premiéru. Cathina sestra už z fandomu vyrástla, ale Cath to nedokáže. Ani nechce.
                
                Obe sestry majú osemnásť a idú na výšku. Wren nečakane vyhlási, že nechce v internáte bývať s Cath, aby bola nezávislejšia. Dvojčatá sa rozdelia a Cath je vydaná napospas namosúrenej spolubývajúcej a jej očarujúcemu frajerovi. Jej profesorka si myslí, že fanfiction je koniec civilizácie, a pekný spolužiak sa chce rozprávať iba o slovách... Popri tom všetkom sa Cath ustavične bojí o milujúceho, no zraniteľného otca, ktorý ešte nikdy nezostal sám. Otázka znie: Zvládne to Cath? Dokáže to, aj keď ju Wren nebude držať za ruku? Je pripravená žiť vlastný život? A chce vôbec vykročiť vpred, ak to znamená, že musí opustiť Simona Snowa?',
                'price' => 11.90,
                'page_count' => 400,
                'genre_id' => 10,
                'language' => 'slovensky',
                'type' => 'brozovana'
            ],
            [
                'isbn' => '9781406378696',
                'title' => 'Release',
                'description' => 'The most personal and tender novel yet from Patrick Ness, the twice Carnegie Medal-winning author of A Monster Calls. It is Saturday, it is summer and, although he does not know it yet, everything in Adam Thorns life is going to fall apart. But maybe, just maybe, he will find freedom from the release. Time is running out though, because way across town, a ghost has risen from the lake... This uplifting coming-of-age novel will remind you what it is like to fall in love.',
                'price' => 11.95,
                'page_count' => 288,
                'genre_id' => 10,
                'language' => 'anglicky',
                'type' => 'pevna'
            ]
        ]);
    }
}
