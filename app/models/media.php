<?php
class Media extends AppModel {

function removeStopWords($start, $end){
       $stopWords = array('a','about','above','across','after','again','against','all','almost','alone','along','already','also','although','always','among','an',
        'and','another','any','anybody','anyone','anything','anywhere','are','area','areas','around','as','ask','asked','asking','asks','at',
        'away','b','back','backed','backing','backs','be','became','because','become','becomes','been','before','began','behind','being','beings',
        'best','better','between','big','both','but','by','c','came','can','cannot','case','cases','certain','certainly','clear','clearly','come',
        'could','d','did','differ','different','differently','do','does','done','down','downed','downing','downs','during','e','each','early',
        'either','end','ended','ending','ends','enough','even','evenly','ever','every','everybody','everyone','everything','everywhere','f','face',
        'faces','fact','facts','far','felt','few','find','finds','first','for','four','from','full','fully','further','furthered','furthering',
        'furthers','g','gave','general','generally','get','gets','give','given','gives','go','going','good','goods','got','great','greater',
        'greatest','group','grouped','grouping','groups','h','had','has','have','having','he','her','here','herself','high','higher','highest',
        'him','himself','his','how','however','i','if','important','in','interest','interested','interesting','interests','into','is','it','its',
        'itself','j','just','k','keep','keeps','kind','knew','know','known','knows','l','large','largely','last','later','latest','least','less',
        'let','lets','like','likely','long','longer','longest','m','made','make','making','man','many','may','me','member','members','men','might','more',
        'most','mostly','mr','mrs','much','must','my','myself','n','necessary','need','needed','needing','needs','never','new','newer','newest','next',
        'no','nobody','non','noone','not','nothing','now','nowhere','number','numbers','o','of','off','often','old','older','oldest','on','once',
        'one','only','open','opened','opening','opens','or','order','ordered','ordering','orders','other','others','our','out','over','p','part','parted',
        'parting','parts','per','perhaps','place','places','point','pointed','pointing','points','possible','present','presented','presenting','presents',
        'problem','problems','put','puts','q','quite','r','rather','really','right','room','rooms','s','said','same','saw','say','says','second','seconds',
        'see','seem','seemed','seeming','seems','sees','several','shall','she','should','show','showed','showing','shows','side','sides','since','small',
        'smaller','smallest','so','some','somebody','someone','something','somewhere','state','states','still','such','sure','t','take','taken','than',
        'that','the','their','them','then','there','therefore','these','they','thing','things','think','thinks','this','those','though','thought',
        'thoughts','three','through','thus','to','today','together','too','took','toward','turn','turned','turning','turns','two','u','under','until',
        'up','upon','us','use','used','uses','v','very','w','want','wanted','wanting','wants','was','way','ways','we','well','wells','went','were',
        'what','when','where','whether','which','while','who','whole','whose','why','will','with','within','without','work','worked','working',
        'works','would','x','y','year','years','yet','you','young','younger','youngest','your','yours','z');

        $content = $this->find('all',array('fields' => array('Media.id', 'Media.content')));
        $result = array();
        for($n=$start; $n<$end; $n++){
            $contentArray = explode(" ", $content[$n]['Media']['content']);
            $newContent = implode(" ",array_diff($contentArray,$stopWords));
            array_push($result,array('Media'=>array(
                                'id'=>$content[$n]['Media']['id'],
                                'content'=>$newContent
                            )));
        }
        $this->save($result);
}


function process ($start, $end) {

        $stopWords = array('a','about','above','across','after','again','against','all', 'allegedly', 'almost','alone','along','already','also','although','always','among','an',
        'and','another','any','anybody','anyone','anything','anywhere','are','area','areas','around','as','ask','asked','asking','asks','at',
        'away','b','back','backed','backing','backs','be','became','because','become','becomes','been','before','began','behind','being','beings',
        'best','better','between','big','both','but','by','c','came','can','cannot','case','cases','certain','certainly','clear','clearly','come',
        'could','d','did','differ','different','differently','do','does','done','down','downed','downing','downs','during','e','each','early',
        'either','end','ended','ending','ends','enough','even','evenly','ever','every','everybody','everyone','everything','everywhere','f','face',
        'faces','fact','facts','far','felt','few','find','finds','first','for','four','from','full','fully','further','furthered','furthering',
        'furthers','g','gave','general','generally','get','gets','give','given','gives','go','going','good','goods','got','great','greater',
        'greatest','group','grouped','grouping','groups','h','had','has','have','having','he','her','here','herself','high','higher','highest',
        'him','himself','his','how','however','i','if','important','in','interest','interested','interesting','interests','into','is','it','its',
        'itself','j','just','k','keep','keeps','kind','knew','know','known','knows','l','large','largely','last','later','latest','least','less',
        'let','lets','like','likely','long','longer','longest','m','made','make','making','man','many','may','me','member','members','men','might','more',
        'most','mostly','mr','mrs','much','must','my','myself','n','necessary','need','needed','needing','needs','never','new','newer','newest','next',
        'no','nobody','non','noone','not','nothing','now','nowhere','number','numbers','o','of','off','often','old','older','oldest','on','once',
        'one','only','open','opened','opening','opens','or','order','ordered','ordering','orders','other','others','our','out','over','p','part','parted',
        'parting','parts','per','perhaps','place','places','point','pointed','pointing','points','possible','present','presented','presenting','presents',
        'problem','problems','put','puts','q','quite','r','rather','really','right','room','rooms','s','said','same','saw','say','says','second','seconds',
        'see','seem','seemed','seeming','seems','sees','several','shall','she','should','show','showed','showing','shows','side','sides','since','small',
        'smaller','smallest','so','some','somebody','someone','something','somewhere','state','states','still','such','sure','t','take','taken','than',
        'that','the','their','them','then','there','therefore','these','they','thing','things','think','thinks','this','those','though','thought',
        'thoughts','three','through','thus','to','today','together','too','took','toward','turn','turned','turning','turns','two','u','under','until',
        'up','upon','us','use','used','uses','v','very','w','want','wanted','wanting','wants','was','way','ways','we','well','wells','went','were',
        'what','when','where','whether','which','while','who','whole','whose','why','will','with','within','without','work','worked','working',
        'works','would','x','y','year','years','yet','you','young','younger','youngest','your','yours','z');

        $positiveWords= array('adaptable', 'Admiration', 'Adorable', 'Affectionate', 'Alive','Anticipate','Appreciated', 'Awe','Bold', 'Bonding',
        'Brilliant', 'Caring', 'Cautious', 'Cheerful', 'Clever', 'Cognizant','Comical', 'Compassionate','Content', 'Cool', 'Coping', 'Cordial',
        'Creative','Curious', 'Dainty','Delight','Devoted','Disciplined','Driven', 'Dutiful', 'Dynamic', 'Elated', 'Enraged', 'Enthused',
        'Enthusiastic', 'Excited', 'Generous', 'Gentle', 'Grateful', 'Gratified','Forgiving', 'Gay', 'Impartial','Inspired', 'Instinctive','Intuitive',
        'Innocent', 'Inquisitive','Happy', 'Heroic', 'Honest', 'Hopeful',
        'Joyful','Kind','Lively', 'Loving', 'Lucky', 'Motivated', 'Natural', 'Nurturing', 'Optimistic', 'Outstanding', 'Patient', 'Perceptive',
        'Perky', 'Positive', 'Powerful', 'Pride','Realistic', 'Relaxed', 'Reliable', 'Relief', 'Repentant', 'Restrained', 'Reverent',
        'Satisfy', 'Sensitive', 'Sentimental', 'Skillful','Sure', 'Sweet', 'Tame','Tender','Understood', 'Victorious', 'Valiant', 'Wise', 'Wonder',
        'Worthy','Vocal','youthful');


        $negativeWords = array('Abandonment', 'Addictive', 'Aggravate', 'Aggressive', 'Agitated', 'Angry', 'Angst', 'Annoyed', 'Anxiety',
        'Arrogance', 'Ashamed', 'Authoritative', 'Awful','Belligerent', 'Bitter', 'Blue', 'Blunt', 'Bored', 'Brutal', 'Bullying', 'Callous',
        'Combative', 'Conflicted', 'Contemptuous', 'Contrary', 'Covetous', 'Cranky', 'Cross', 'Cruelty',
        'Defeated', 'Defiant', 'Dejected', 'Dependent', 'Depressed', 'Despair', 'Disagreeable', 'Discontent', 'Disgust', 'Disturbed', 'Doubtful',
        'Envy', 'Evil','Fear', 'Fierce', 'Frustrated', 'Furious', 'Greedy', 'Grieving', 'Harsh', 'Hatred', 'Haughty', 'Horror', 'Hostile',
        'Ignored', 'Impatient', 'Impulsive', 'Inconsiderate', 'Insensitivity', 'Intolerance', 'Irritate', 'Isolated', 'Jealous',
        'Lonely', 'Lost', 'Mad', 'Malice', 'Mean', 'Meek', 'Mollified', 'Nasty', 'Naughty', 'Negative',
        'Obnoxious', 'Obstinate', 'Outraged', 'Pain', 'Panic', 'Perturb', 'Pessimistic', 'Pity',
        'Quirky', 'Quivering', 'Racist', 'Rage', 'Raw', 'Scornful', 'Reluctant', 'Repulsive', 'Resent', 'Resigned', 'Rough', 'Rude',
        'Severe', 'Shame', 'Sick', 'Silly', 'Sorrow', 'Spite', 'Stubborn', 'Surprise','Tense', 'Terrified', 'Terse', 'Tired', 'Unbalanced',
        'Uncertain', 'Unhappy','Vindictive', 'Violent', 'Vociferous', 'Wary', 'Weary', 'Wicked', 'Worrier', 'Wrath');

        $content = $this->find('all',array('fields' => array('Media.id', 'Media.content')));
        $lists = array($positiveWords, $negativeWords);
        for($n=$start; $n<$end; $n++){
            $frequency = array(
                array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
                array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0)
            );

            $contentArray = explode(" ", $content[$n]['Media']['content']);

            for($l=0; $l<count($lists);$l++){
                $emotions = $lists[$l];
                for($i=0;$i<count($contentArray);$i++){
                    $j=0;
                    while($j<count($emotions)){
                        if(strtolower($emotions[$j]) == strtolower($contentArray[$i])){
                            $frequency[$l][$j]++;
                        }
                        $j++;
                    }
                }
            }

            $max=0;
            $posOrNeg = -1;
            $maxIndex = -1;
            for($ll=0; $ll<count($frequency);$ll++){
                for($i=0;$i<count($frequency[$ll]);$i++){
                    if($frequency[$ll][$i] > $max){
                        $posOrNeg = $ll;
                        $maxIndex = $i;
                        $max = $frequency[$ll][$i];
                    }
                }
            }

            if($max > 0){
                $result=array('Media'=>array(
                                    'id'=>$content[$n]['Media']['id'],
                                    'posorneg'=>$posOrNeg,
                                    'word'=>$lists[$posOrNeg][$maxIndex]
                                ));
                $this->save($result);
            }

        }

    }


    function evaluateContent($content){
        $contentArray = explode(" ", $content);
        for($i=0; $i++; $i<count($contentArray)){
            $this->Concept->find($contentArray[$i]);
        }
    }

    function stem( $word ){
        if ( empty($word) ) {
            return false;
        }

        $result = '';

        $word = strtolower($word);

        // Strip punctuation, etc. Keep ' and . for URLs and contractions.
        if ( substr($word, -2) == "'s" ) {
            $word = substr($word, 0, -2);
        }
        $word = preg_replace("/[^a-z0-9'.-]/", '', $word);

        $first = '';
        if ( strpos($word, '-') !== false ) {
            //list($first, $word) = explode('-', $word);
            //$first .= '-';
            $first = substr($word, 0, strrpos($word, '-') + 1); // Grabs hyphen too
            $word = substr($word, strrpos($word, '-') + 1);
        }
        if ( strlen($word) > 2 ) {
            $word = $this->_step_1($word);
            $word = $this->_step_2($word);
            $word = $this->_step_3($word);
            $word = $this->_step_4($word);
            $word = $this->_step_5($word);
        }

        $result = $first . $word;

        return $result;
    }

    function stem_list( $words ){
        if ( empty($words) ) {
            return false;
        }

        $results = array();

        if ( !is_array($words) ) {
            $words = split("[ ,;\n\r\t]+", trim($words));
        }

        foreach ( $words as $word ) {
            if ( $result = $this->stem($word) ) {
                $results[] = $result;
            }
        }

        return $results;
    }

    function _step_1( $word ){
        // Step 1a
        if ( substr($word, -1) == 's' ) {
            if ( substr($word, -4) == 'sses' ) {
                $word = substr($word, 0, -2);
            } elseif ( substr($word, -3) == 'ies' ) {
                $word = substr($word, 0, -2);
            } elseif ( substr($word, -2, 1) != 's' ) {
                // If second-to-last character is not "s"
                $word = substr($word, 0, -1);
            }
        }
        // Step 1b
        if ( substr($word, -3) == 'eed' ) {
            if ($this->count_vc(substr($word, 0, -3)) > 0 ) {
                // Convert '-eed' to '-ee'
                $word = substr($word, 0, -1);
            }
        } else {
            if ( preg_match('/([aeiou]|[^aeiou]y).*(ed|ing)$/', $word) ) { // vowel in stem
                // Strip '-ed' or '-ing'
                if ( substr($word, -2) == 'ed' ) {
                    $word = substr($word, 0, -2);
                } else {
                    $word = substr($word, 0, -3);
                }
                if ( substr($word, -2) == 'at' || substr($word, -2) == 'bl' ||
                     substr($word, -2) == 'iz' ) {
                    $word .= 'e';
                } else {
                    $last_char = substr($word, -1, 1);
                    $next_to_last = substr($word, -2, 1);
                    // Strip ending double consonants to single, unless "l", "s" or "z"
                    if ( $this->is_consonant($word, -1) &&
                         $last_char == $next_to_last &&
                         $last_char != 'l' && $last_char != 's' && $last_char != 'z' ) {
                        $word = substr($word, 0, -1);
                    } else {
                        // If VC, and cvc (but not w,x,y at end)
                        if ( $this->count_vc($word) == 1 && $this->_o($word) ) {
                            $word .= 'e';
                        }
                    }
                }
            }
        }
        // Step 1c
        // Turn y into i when another vowel in stem
        if ( preg_match('/([aeiou]|[^aeiou]y).*y$/', $word) ) { // vowel in stem
            $word = substr($word, 0, -1) . 'i';
        }
        return $word;
    }

    function _step_2( $word ){
        switch ( substr($word, -2, 1) ) {
            case 'a':
                if ( $this->_replace($word, 'ational', 'ate', 0) ) {
                    return $word;
                }
                if ( $this->_replace($word, 'tional', 'tion', 0) ) {
                    return $word;
                }
                break;
            case 'c':
                if ( $this->_replace($word, 'enci', 'ence', 0) ) {
                    return $word;
                }
                if ( $this->_replace($word, 'anci', 'ance', 0) ) {
                    return $word;
                }
                break;
            case 'e':
                if ( $this->_replace($word, 'izer', 'ize', 0) ) {
                    return $word;
                }
                break;
            case 'l':
                // This condition is a departure from the original algorithm;
                // I adapted it from the departure in the ANSI-C version.
                if ( $this->_replace($word, 'bli', 'ble', 0) ) {
                    return $word;
                }
                if ( $this->_replace($word, 'alli', 'al', 0) ) {
                    return $word;
                }
                if ( $this->_replace($word, 'entli', 'ent', 0) ) {
                    return $word;
                }
                if ( $this->_replace($word, 'eli', 'e', 0) ) {
                    return $word;
                }
                if ( $this->_replace($word, 'ousli', 'ous', 0) ) {
                    return $word;
                }
                break;
            case 'o':
                if ( $this->_replace($word, 'ization', 'ize', 0) ) {
                    return $word;
                }
                if ( $this->_replace($word, 'isation', 'ize', 0) ) {
                    return $word;
                }
                if ( $this->_replace($word, 'ation', 'ate', 0) ) {
                    return $word;
                }
                if ( $this->_replace($word, 'ator', 'ate', 0) ) {
                    return $word;
                }
                break;
            case 's':
                if ( $this->_replace($word, 'alism', 'al', 0) ) {
                    return $word;
                }
                if ( $this->_replace($word, 'iveness', 'ive', 0) ) {
                    return $word;
                }
                if ( $this->_replace($word, 'fulness', 'ful', 0) ) {
                    return $word;
                }
                if ( $this->_replace($word, 'ousness', 'ous', 0) ) {
                    return $word;
                }
                break;
            case 't':
                if ( $this->_replace($word, 'aliti', 'al', 0) ) {
                    return $word;
                }
                if ( $this->_replace($word, 'iviti', 'ive', 0) ) {
                    return $word;
                }
                if ( $this->_replace($word, 'biliti', 'ble', 0) ) {
                    return $word;
                }
                break;
            case 'g':
                // This condition is a departure from the original algorithm;
                // I adapted it from the departure in the ANSI-C version.
                if ( $this->_replace($word, 'logi', 'log', 0) ) { //*****
                    return $word;
                }
                break;
        }
        return $word;
    }

    function _step_3( $word ){
        switch ( substr($word, -1) ) {
            case 'e':
                if ( $this->_replace($word, 'icate', 'ic', 0) ) {
                    return $word;
                }
                if ( $this->_replace($word, 'ative', '', 0) ) {
                    return $word;
                }
                if ( $this->_replace($word, 'alize', 'al', 0) ) {
                    return $word;
                }
                break;
            case 'i':
                if ( $this->_replace($word, 'iciti', 'ic', 0) ) {
                    return $word;
                }
                break;
            case 'l':
                if ( $this->_replace($word, 'ical', 'ic', 0) ) {
                    return $word;
                }
                if ( $this->_replace($word, 'ful', '', 0) ) {
                    return $word;
                }
                break;
            case 's':
                if ( $this->_replace($word, 'ness', '', 0) ) {
                    return $word;
                }
                break;
        }
        return $word;
    }

    /**
* Performs the function of step 4 of the Porter Stemming Algorithm.
*
* Step 4 works similarly to steps 3 and 2, above, though it removes
* the endings in the context of VCVC (vowel-consonant-vowel-consonant
* combinations).
*
* @param string $word Word to reduce
* @access private
* @return string Reduced word
*/
    function _step_4( $word ){
        switch ( substr($word, -2, 1) ) {
            case 'a':
                if ( $this->_replace($word, 'al', '', 1) ) {
                    return $word;
                }
                break;
            case 'c':
                if ( $this->_replace($word, 'ance', '', 1) ) {
                    return $word;
                }
                if ( $this->_replace($word, 'ence', '', 1) ) {
                    return $word;
                }
                break;
            case 'e':
                if ( $this->_replace($word, 'er', '', 1) ) {
                    return $word;
                }
                break;
            case 'i':
                if ( $this->_replace($word, 'ic', '', 1) ) {
                    return $word;
                }
                break;
            case 'l':
                if ( $this->_replace($word, 'able', '', 1) ) {
                    return $word;
                }
                if ( $this->_replace($word, 'ible', '', 1) ) {
                    return $word;
                }
                break;
            case 'n':
                if ( $this->_replace($word, 'ant', '', 1) ) {
                    return $word;
                }
                if ( $this->_replace($word, 'ement', '', 1) ) {
                    return $word;
                }
                if ( $this->_replace($word, 'ment', '', 1) ) {
                    return $word;
                }
                if ( $this->_replace($word, 'ent', '', 1) ) {
                    return $word;
                }
                break;
            case 'o':
                // special cases
                if ( substr($word, -4) == 'sion' || substr($word, -4) == 'tion' ) {
                    if ( $this->_replace($word, 'ion', '', 1) ) {
                        return $word;
                    }
                }
                if ( $this->_replace($word, 'ou', '', 1) ) {
                    return $word;
                }
                break;
            case 's':
                if ( $this->_replace($word, 'ism', '', 1) ) {
                    return $word;
                }
                break;
            case 't':
                if ( $this->_replace($word, 'ate', '', 1) ) {
                    return $word;
                }
                if ( $this->_replace($word, 'iti', '', 1) ) {
                    return $word;
                }
                break;
            case 'u':
                if ( $this->_replace($word, 'ous', '', 1) ) {
                    return $word;
                }
                break;
            case 'v':
                if ( $this->_replace($word, 'ive', '', 1) ) {
                    return $word;
                }
                break;
            case 'z':
                if ( $this->_replace($word, 'ize', '', 1) ) {
                    return $word;
                }
                break;
        }
        return $word;
    }

    /**
* Performs the function of step 5 of the Porter Stemming Algorithm.
*
* Step 5 removes a final "-e" and changes "-ll" to "-l" in the context
* of VCVC (vowel-consonant-vowel-consonant combinations).
*
* @param string $word Word to reduce
* @access private
* @return string Reduced word
*/
    function _step_5( $word ){
        if ( substr($word, -1) == 'e' ) {
            $short = substr($word, 0, -1);
            // Only remove in vcvc context...
            if ( $this->count_vc($short) > 1 ) {
                $word = $short;
            } elseif ( $this->count_vc($short) == 1 && !$this->_o($short) ) {
                $word = $short;
            }
        }
        if ( substr($word, -2) == 'll' ) {
            // Only remove in vcvc context...
            if ( $this->count_vc($word) > 1 ) {
                $word = substr($word, 0, -1);
            }
        }
        return $word;
    }

    /**
* Checks that the specified letter (position) in the word is a consonant.
*
* Handy check adapted from the ANSI C program. Regular vowels always return
* FALSE, while "y" is a special case: if the prececing character is a vowel,
* "y" is a consonant, otherwise it's a vowel.
*
* And, if checking "y" in the first position and the word starts with "yy",
* return true even though it's not a legitimate word (it crashes otherwise).
*
* @param string $word Word to check
* @param integer $pos Position in the string to check
* @access public
* @return boolean
*/
    function is_consonant( $word, $pos ){
        // Sanity checking $pos
        if ( abs($pos) > strlen($word) ) {
            if ( $pos < 0 ) {
                // Points "too far back" in the string. Set it to beginning.
                $pos = 0;
            } else {
                // Points "too far forward." Set it to end.
                $pos = -1;
            }
        }
        $char = substr($word, $pos, 1);
        switch ( $char ) {
            case 'a':
            case 'e':
            case 'i':
            case 'o':
            case 'u':
                return false;
            case 'y':
                if ( $pos == 0 || strlen($word) == -$pos ) {
                    // Check second letter of word.
                    // If word starts with "yy", return true.
                    if ( substr($word, 1, 1) == 'y' ) {
                        return true;
                    }
                    return !($this->is_consonant($word, 1));
                } else {
                    return !($this->is_consonant($word, $pos - 1));
                }
            default:
                return true;
        }
    }

    /**
* Counts (measures) the number of vowel-consonant occurences.
*
* Based on the algorithm; this handy function counts the number of
* occurences of vowels (1 or more) followed by consonants (1 or more),
* ignoring any beginning consonants or trailing vowels. A legitimate
* VC combination counts as 1 (ie. VCVC = 2, VCVCVC = 3, etc.).
*
* @param string $word Word to measure
* @access public
* @return integer
*/
    function count_vc( $word ){
        $m = 0;
        $length = strlen($word);
        $prev_c = false;
        for ( $i = 0; $i < $length; $i++ ) {
            $is_c = $this->is_consonant($word, $i);
            if ( $is_c ) {
                if ( $m > 0 && !$prev_c ) {
                    $m += 0.5;
                }
            } else {
                if ( $prev_c || $m == 0 ) {
                    $m += 0.5;
                }
            }
            $prev_c = $is_c;
        }
        $m = floor($m);
        return $m;
    }

    /**
* Checks for a specific consonant-vowel-consonant condition.
*
* This function is named directly from the original algorithm. It
* looks the last three characters of the word ending as
* consonant-vowel-consonant, with the final consonant NOT being one
* of "w", "x" or "y".
*
* @param string $word Word to check
* @access private
* @return boolean
*/
    function _o( $word ){
        if ( strlen($word) >= 3 ) {
            if ( $this->is_consonant($word, -1) && !$this->is_consonant($word, -2) &&
                 $this->is_consonant($word, -3) ) {
                $last_char = substr($word, -1);
                if ( $last_char == 'w' || $last_char == 'x' || $last_char == 'y' ) {
                    return false;
                }
                return true;
            }
        }
        return false;
    }

    /**
* Replaces suffix, if found and word measure is a minimum count.
*
* @param string $word Word to check and modify
* @param string $suffix Suffix to look for
* @param string $replace Suffix replacement
* @param integer $m Word measure value that the word must be greater
* than to replace
* @access private
* @return boolean
*/
    function _replace( &$word, $suffix, $replace, $m = 0 ){
        $sl = strlen($suffix);
        if ( substr($word, -$sl) == $suffix ) {
            $short = substr_replace($word, '', -$sl);
            if ( $this->count_vc($short) > $m ) {
                $word = $short . $replace;
            }
            // Found this suffix, doesn't matter if replacement succeeded
            return true;
        }
        return false;
    }
}
?>
