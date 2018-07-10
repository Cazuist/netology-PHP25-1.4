<?php
    {$animals = [
        'Antarctica' => ['Leptonychotes weddellii', 'Hydrurga leptonyx', 'Aptenodytes forsteri'],
        'Africa' => ['Giraffa camelopardalis', 'Hippopotamus amphibius', 'Panthera leo'],
        'Australia' => ['Vombatus ursinus', 'Zaglossus', 'Phascolarctos cinereus'],
        'North_America' => ['Alligator mississippiensis', 'Ursus arctos middendorffi', 'Mephitis mephitis'],
        'South_America' => ['Lama glama', 'Puma concolor', 'Choloepus didactylus'],
        'Eurasia' => ['Ursus', 'Elephas maximus', 'Pongo pygmaeus', 'Canis lupus', 'Camelus bactrianus']
    ];

    $firstWord = [];
    $secondWord = [];
    $fantasyAnimals = [];
    $resultList = [];

    foreach ($animals as $continent => $animalList) {
        $resultList[$continent] = [];
        foreach ($animalList as $animal) {
            $expl = explode(' ', $animal);
            if (count($expl) === 2) {
                $firstWord[] = $continent.' '.$expl[0];
                $secondWord[] = $expl[1];
            }
        }
    }    
    
    shuffle($secondWord);
    
    for ($i = 0; $i < count($firstWord); $i++) {
        $fantasyAnimals[] = $firstWord[$i].' '.$secondWord[$i];
    }
    
    foreach ($resultList as $continent => $animals) {
        foreach ($fantasyAnimals as $animal) {
            $expl = explode(' ', $animal);
            if ($expl[0] === $continent) {
                $resultList[$continent][] = $expl[1].' '.$expl[2];
            }
        }
    }}
        
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Animals monstruosus</title>
  <link rel="stylesheet" href="css/styles.css">  
</head>
<body>    
    <h1>Сон разума рождает чудовищ...</h1>
    <ol>

        <?
        foreach ($resultList as $continent => $animals) {
            ?>        
                <li class="<?= $continent ?>">                
                    <h2><?= $continent ?></h2>
                    <span><?= implode(', ', $animals) ?></span>                
                </li>                    
            <?
        }?>
    
    </ol>

</body>
</html>