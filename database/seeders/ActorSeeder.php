<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('actors')->insert([
            "name" => "Chris Pratt",
            "gender" => "Male",
            "birthdate" => "1979-06-21",
            "place_of_birth" => "Virginia, Minnesota, United States",
            "biography" => "Christopher Michael Pratt was born on June 21, 1979, in Virginia, Minnesota. His mother worked at a Safeway supermarket, and his father worked in mining and later remodeling houses. Pratt's father died in 2014 from multiple sclerosis. His mother is of Norwegian descent. When Pratt was seven years old, the family moved to Lake Stevens, Washington.
                            Pratt placed fifth in a high school state wrestling tournament. He also was a shot putter for his high school's track team. He later recalled that when his wrestling coach asked him what he wished to do with his life, he said 'I don't know, but I know I'll be famous and I know I'll make a shit ton of money.' I had no idea how. I'd done nothing proactive.'
                            He graduated from Lake Stevens High School in 1997.",
            "popularity" => "9.0",
            "image" => "storage/actors/1.jpg"
        ]);

        DB::table('actors')->insert([
            "name" => "Bryce Dallas Howard",
            "gender" => "Female",
            "birthdate" => "1981-03-02",
            "place_of_birth" => "Los Angeles, California, United States",
            "biography" => "Bryce Dallas Howard was born March 2, 1981, in Los Angeles, California, to writer Cheryl Howard and actor-director Ron Howard. She has two younger sisters; twins Jocelyn and Paige, and a younger brother named Reed. Through her father, Bryce is a granddaughter of actors Rance Howard and Jean Speegle Howard, as well as a niece of actor Clint Howard.
                            Her godfather is actor Henry Winkler, who co-starred with her father in the 1970s–1980s American comedy television series Happy Days.
                            Howard began training as an actor at Stagedoor Manor, a performing arts camp in upstate New York, alongside Natalie Portman. Howard attended Greenwich Country Day School until 1996, and graduated from Byram Hills High School in 1999, after which she studied for three years at New York University's (NYU) Tisch School of the Arts, taking classes at the Stella Adler Studio of Acting, the Experimental Theatre Wing, and the International Theatre Workshop in Amsterdam. During her schooling, Howard took part in the concept recording of the Broadway-bound musical A Tale of Two Cities. She took a leave of absence from NYU to pursue roles without completing her degree. Decades later, she returned to NYU and completed her degree in 2020.",
            "popularity" => "9.0",
            "image" => "storage/actors/2.jpg"
        ]);

        DB::table('actors')->insert([
            "name" => "Mark Wahlberg",
            "gender" => "Male",
            "birthdate" => "1971-06-05",
            "place_of_birth" => "Dorchester, Boston, Massachusetts, United States",
            "biography" => "Mark Robert Michael Wahlberg was born on June 5, 1971, in the Dorchester neighborhood of Boston, Massachusetts. He is the youngest of nine children, including actor Robert and singer/actor Donnie. His mother, Alma Elaine (née Donnelly; 1942–2021), was a bank clerk and a nurse's aide, and his father, Donald Edmond Wahlberg Sr. (1930–2008), was a delivery driver and U.S. Army veteran of the Korean War. Wahlberg's parents divorced in 1982; afterward, he divided his time between them.
            Wahlberg is of Swedish descent through his father, and of Irish descent through his paternal grandmother. His mother was of Irish, English and French-Canadian ancestry. On his mother's side of the family, he is distantly related to author Nathaniel Hawthorne. Wahlberg was raised Catholic, and attended Copley Square High School on Newbury Street in Boston. By age 13, he had developed an addiction to cocaine and other substances; he did not receive his high school diploma until June 2013, at the age of 42.",
            "popularity" => "9.0",
            "image" => "storage/actors/3.jpg"
        ]);

        DB::table('actors')->insert([
            "name" => "Tom Holland",
            "gender" => "Male",
            "birthdate" => "1996-06-01",
            "place_of_birth" => "Kingston upon Thames, United Kingdom",
            "biography" => "Thomas Stanley Holland was born on 1 June 1996 in Kingston upon Thames in south west London, to photographer Nicola (née Frost) and Dominic Holland, a comedian and author.
                            Holland was educated at Donhead, an all-male Catholic preparatory school in Wimbledon in south west London. When he was seven, he was diagnosed with dyslexia.
                            Growing up, Holland considered several career choices. As a child, he was a fan of Janet Jackson's songs, and would often dance to them. His mother, impressed with this, signed him up for a dancing class, which was advertised in the private school that Holland was visiting at the time.",
            "popularity" => "9.0",
            "image" => "storage/actors/4.jpg"
        ]);

        DB::table('actors')->insert([
            "name" => "Anthony Bajon",
            "gender" => "Male",
            "birthdate" => "1994-04-07",
            "place_of_birth" => "Villeneuve-Saint-Georges, France",
            "biography" => "Anthony Bajon began his acting career at the age of 12 on the stage of theater. Since then he has performed regularly in various theaters in France.
                            In 2015, Bajon debuted in Léa Fehner's film Les Ogres, after which he starred in the films Rodin by Jacques Doillon, and André Téchiné's Golden Years among others.
                            In 2018, Anthony Bajon played the lead role of 22-year-old drug addict Thomas in Cédric Kahn's movie The Prayer. For this role, he received the Silver Bear for Best Actor at the Berlin International Film Festival, becoming the seventh French actor in history of the festival to be honored with this award.",
            "popularity" => "9.0",
            "image" => "storage/actors/5.jpg"
        ]);

        DB::table('actors')->insert([
            "name" => "Dali Benssalah",
            "gender" => "Male",
            "birthdate" => "1992-01-08",
            "place_of_birth" => "Rennes, France",
            "biography" => "Benssalah was born in Rennes to a family of Algerian descent. He was a Muay Thai martial artist champion before graduating from the Cours Florent drama school. He began working in film and television in 2013.
                            In 2018, he appeared in Louis Garrel's A Faithful Man and became known to international audiences for his role as assassin Primo in the James Bond movie No Time to Die.",
            "popularity" => "9.0",
            "image" => "storage/actors/6.jpg"
        ]);

        DB::table('actors')->insert([
            "name" => "Byeon Woo-seok",
            "gender" => "Male",
            "birthdate" => "1991-10-31",
            "place_of_birth" => "Seoul, South Korea",
            "biography" => "He first made his debut as a model in 2014.
                            He made his debut as an actor in 2016, playing a minor role as Ha-jin's boyfriend in the SBS historical drama Moon Lovers: Scarlet Heart Ryeo.
                            In 2019, he played a supporting role in WWW. The same year, he played Do-joon in the JTBC television series Flower Crew: Joseon Marriage Agency and was praised by the audience.
                            In 2020, he got cast in a lead role in the tvN television series Record of Youth as Won Hae-hyo, starring opposite of Park So-dam and Park Bo-gum.
                            In 2021, he was cast in KBS2's historical drama Moonshine as Lee Pyo, the rebellious crown prince, alongside Yoo Seung-ho, Lee Hye-ri and Kang Mi-na.",
            "popularity" => "9.0",
            "image" => "storage/actors/7.jpg"
        ]);

        DB::table('actors')->insert([
            "name" => "Kim Yoo-jung",
            "gender" => "Female",
            "birthdate" => "1999-09-22",
            "place_of_birth" => "Geumho-dong, South Korea",
            "biography" => "Kim was born in Seongdong District, Seoul, South Korea on September 22, 1999 as the youngest of three siblings. Her older sister, Kim Yeon-jung, debuted as an actress in 2017.
                            Kim attended Goyang High School of Arts and graduated in January 2018. Kim deferred taking the national College Scholastic Ability Test in 2017, and instead decided to focus on her acting career.",
            "popularity" => "9.0",
            "image" => "storage/actors/8.jpeg"
        ]);

        DB::table('actors')->insert([
            "name" => "Kento Nakajima",
            "gender" => "Male",
            "birthdate" => "1994-03-13",
            "place_of_birth" => "Tokyo, Japan",
            "biography" => "Nakajima was part of B.I.Shadow. In 2008, B.I.Shadow was formed as a Johnny's Jr. group. At that time the members were: Kento Nakajima, Fuma Kikuchi, and Misaki Takahata. During that year, they acted in the drama Scrap Teacher. He is one of the chosen personalities to represent the network WOWOW during the broadcast of 92nd Academy Awards. He studied English for this occasion and showed wonderful English-speaking skills.",
            "popularity" => "9.0",
            "image" => "storage/actors/9.jpg"
        ]);

        DB::table('actors')->insert([
            "name" => "Honoka Matsumoto",
            "gender" => "Female",
            "birthdate" => "1997-02-05",
            "place_of_birth" => "Sakai, Osaka, Japan",
            "biography" => "Honoka Matsumoto was born in Sakai, Osaka, Japan. Honoka Matsumoto is Actress by profession.",
            "popularity" => "9.0",
            "image" => "storage/actors/10.jpg"
        ]);

        DB::table('actors')->insert([
            "name" => "Uriah Shelton",
            "gender" => "Male",
            "birthdate" => "1997-03-10",
            "place_of_birth" => "Dallas, Texas, United States",
            "biography" => "Shelton was born in Dallas, Texas, and has also lived in Magnolia Springs, Alabama. He took a modeling class at the age of 7, which led to the start of his acting career in television commercials. Shelton is also involved in mixed martial arts.
                            Shelton has starred in television shows, including: Without a Trace, The Ghost Whisperer, Mad TV, Dirty Sexy Money, The Suite Life on Deck, Monk, Trust Me, Trauma, Hallmark's The Nanny Express, and the independent feature Alabama Moon.",
            "popularity" => "9.0",
            "image" => "storage/actors/11.jpg"
        ]);

        DB::table('actors')->insert([
            "name" => "Brianne Tju",
            "gender" => "Female",
            "birthdate" => "1998-06-14",
            "place_of_birth" => "Chino Hills, California, United States",
            "biography" => "Tju was born and raised in Chino Hills, California. She graduated from Ruben S. Ayala High School and currently undergoes her studies at the California State University, Fullerton. She is the older sister of actress Haley Tju. She is of Chinese and Indonesian heritage.
                            In 2007, Tju made her television acting debut in the Disney Channel series Cory in the House. Following on from her first role, Tju won other roles on a variety of TV shows and films including Liv and Maddie, Pass the Light, Grey's Anatomy, A.P. Bio and 9-1-1.
                            In 2015, Tju starred in the recurring role of Riley Marra on the MTV slasher television series Scream.
                            On June 4, 2018, it was announced that Tju had been cast in the series regular role of Alex Portnoy on the Hulu series Light as a Feather.
                            Tju co-starred in the survival horror film 47 Meters Down: Uncaged, which was released in theaters on August 16, 2019.",
            "popularity" => "9.0",
            "image" => "storage/actors/12.jpg"
        ]);

        DB::table('actors')->insert([
            "name" => "Inori Minase",
            "gender" => "Female",
            "birthdate" => "1995-12-02",
            "place_of_birth" => "Tokyo, Japan",
            "biography" => "Minase was born in Tokyo on December 2, 1995. She had begun watching anime when she was in kindergarten. She first became aware of voice acting when, after watching a stage play adaptation of an anime, she read the stage pamphlet and asked her parents about the name of a person mentioned in it. She wanted to become a voice actor from the age of six, and at elementary school she listed voiced acting as her desired career.
                            Minase joined her middle school's tennis and theater clubs. She quit the theater club because she felt too embarrassed to appear on stage. Around that time, her mother found a magazine advertisement for a voice-acting audition, which she passed.",
            "popularity" => "9.0",
            "image" => "storage/actors/13.jpg"
        ]);

        DB::table('actors')->insert([
            "name" => "Ayumu Murase",
            "gender" => "Male",
            "birthdate" => "1995-12-14",
            "place_of_birth" => "Los Angeles, California, United States",
            "biography" => "Murase was born in the United States, but grew up in Aichi, Japan. He lived in Aichi until graduating from high school, after which he attended university in Kyoto Prefecture. Later, he moved to Tokyo.
                            After showing an interest in theatre, Murase joined the Japan Narration Actors Institute with the aim of becoming a voice actor. In 2011, he made his debut as a voice actor in the role of a male student in the TV anime Persona 4: The Animation. The following year, he played the first main character in the role of Shun Aonuma (14 years old) in From the New World. In 2014, he starred in the role of Shoyo Hinata in Haikyu!!.
                            In 2016, Murase won the Seiyu Award for Best Male Rookie.",
            "popularity" => "9.0",
            "image" => "storage/actors/14.jpg"
        ]);
    }
}
