<?php
    $file = null;
    if( !empty( $_POST["spieler"] ) && empty( $_POST["bogen-submit"] ) )
    {
        $spieler = $_POST["spieler"];
        $fileName = "entries/" . $_POST["spieler"] . ".json";
        $_POST = [];
        $_POST["spieler"] = $spieler;
        if( is_file( $fileName ) )
        {
            $file = json_decode( file_get_contents( $fileName ) );
            if( $file != null )
            {
                foreach( get_object_vars( $file ) as $key => $val )
                {
                    if( is_object( $val ) )
                    {
                        foreach( get_object_vars( $val ) as $key2 => $val2 )
                        {
                            $_POST[ $key ][ $key2 ] = $val2;
                        }
                    }
                    else
                    {
                        $_POST[ $key ] = $val;
                    }
                }
            }
        }
    }

    if( !empty( $_POST["bogen-submit"] ) )
    {
        if( !empty( $_POST["spieler"] ) )
        {
            $fileName = "entries/" . $_POST["spieler"] . ".json";
            file_put_contents( $fileName, json_encode( $_POST ) );
        }
        else
        {
            $error[] = "Erst den Spieler auswählen.";
        }
    }
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Pen & Paper - OneShot Abenteuer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.1/css/bulma.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        .columns{
            margin-bottom: 0 !important;
        }

        .calcField{
            background-color: #f5f5f5;
            border-color: #f5f5f5;
            box-shadow: none;
        }
    </style>
</head>
<body>
    <section class="section">
        <div class="container">
            <h1 class="title">Kurzregeln</h1>
            <div class="content">
                Wir spielen ein OneShot Abenteuer. Heißt das ihr Charaktere erstellt, die nur für dieses Abenteuer gedacht sind. Danach werden sie nicht mehr weiter verwendet. 
                <p>Die Regeln sind eine Mischung aus den Cthulhu Rollenspielen und sowie anderen eher auf Story ausgelegten RPGs. Die Charaktererstellung ist recht einfach gehalten. Es ist nicht erforderlich sich mit dem Cthulhu Universum auseinander gesetzt zu haben. Alles wichtige wird hier erklärt, bzw. beim Spielstart mitgeteilt.</p>
                <p>Bei diesem OneShot Abenteuer wird mit Prozentwürfeln gewürfelt. Das heißt das man 2 10-seitigen Würfeln bekomment mit denen man Werte zwischen 0-100% würfeln kann.</p>
                <p>Zur Rahmenhandlung: Das Abenteuer spielt <strong>1928 in England</strong>. Ihr müsst euch also Charaktere überlegen die gut in dieses Setting passen. Wenn man zu Swing abgeht, trinkt wie ein Rohrspatz und Raucht wie eine ganze Fabrik, dann ist man schon gut dabei. Künstlerische Freiheit ist auch immer gegeben. Wer zum Spielen Accessoires mitbringen möchte kann dies gerne tun. Muss natürlich zum Charakter passen.</p>
            </div>
        </div>
    </section>
    <section class="section" style="padding-top: 0">
        <div class="container">
            <h1 class="title">Charakterbogen</h1>
            <hr style="margin: 1.5rem 0;">
            <div class="content">
                <div class="columns">  
                    <div class="column is-half">
                        <form action="" method="POST" id="character-form">
                            <input type="hidden" name="player-select" value="0" />
                            <div class="columns">
                                <div class="column field">
                                  <label class="label">Spieler</label>
                                  <p class="control is-expanded">
                                    <span class="select is-fullwidth">
                                      <select name="spieler" id="player-select">
                                        <option>Bitte auswählen - Nur am Anfang machen sonst gehen Daten verloren</option>
                                        <option value="andreas" <?= isset( $_POST["spieler"] ) && $_POST["spieler"] == "andreas" ? "selected" : "" ?>>Andreas</option>
                                        <option value="dani" <?= isset( $_POST["spieler"] ) && $_POST["spieler"] == "dani" ? "selected" : "" ?>>Dani</option>
                                        <option value="siggi" <?= isset( $_POST["spieler"] ) && $_POST["spieler"] == "siggi" ? "selected" : "" ?>>Siggi</option>
                                        <option value="theresa" <?= isset( $_POST["spieler"] ) && $_POST["spieler"] == "theresa" ? "selected" : "" ?>>Theresa</option>
                                        <option value="verena" <?= isset( $_POST["spieler"] ) && $_POST["spieler"] == "verena" ? "selected" : "" ?>>Verena</option>
                                      </select>
                                    </span>
                                  </p>
                                </div>
                            </div>
                            <div class="columns">
                                <div class="column field">
                                  <label class="label">Name</label>
                                  <p class="control">
                                    <input class="input" type="text" name="name" placeholder="Name" value="<?php get("name") ?>">
                                  </p>
                                </div>
                            </div>
                            <div class="columns">
                                <div class="column is-6 field">
                                  <label class="label">Geschlecht</label>
                                  <p class="control">
                                    <input class="input" type="text" name="geschlecht" placeholder="Geschlecht" value="<?php get("geschlecht") ?>">
                                  </p>
                                </div>
                                <div class="column is-6 field">
                                  <label class="label">Alter</label>
                                  <p class="control">
                                    <input class="input" type="text" name="alter" placeholder="Alter" value="<?php get("alter") ?>">
                                  </p>
                                </div>
                            </div>
                            <div class="columns">
                                <div class="column is-6 field">
                                  <label class="label">Statur</label>
                                  <p class="control">
                                    <input class="input" type="text" name="statur" placeholder="Statur" value="<?php get("statur") ?>">
                                  </p>
                                </div>
                                <div class="column is-6 field">
                                  <label class="label">Religion</label>
                                  <p class="control">
                                    <input class="input" type="text" name="religion" placeholder="Religion" value="<?php get("religion") ?>">
                                  </p>
                                </div>
                            </div>
                            <div class="columns">
                                <div class="column is-6 field">
                                  <label class="label">Beruf</label>
                                  <p class="control">
                                    <input class="input" type="text" name="beruf" placeholder="Beruf" value="<?php get("beruf") ?>">
                                  </p>
                                </div>
                                <div class="column is-6 field">
                                  <label class="label">Familienstand</label>
                                  <p class="control">
                                    <input class="input" type="text" name="familienstand" placeholder="Familienstand" value="<?php get("familienstand") ?>">
                                  </p>
                                </div>
                            </div>
                        </div>
                        <div class="column is-half">
                            <div class="content">
                                <h2>Anleitung zur Charaktererstellung</h2>
                                <span style="font-size: 0.9em">
                                    <p>Jeder hat 400 Punkte die er auf seine Fähigkeiten verteilen kann. Diese sollten nur in Fähigkeiten investiert werden die man besonders gut kann. Grundfähigkeiten wie Rennen, Lesen, Schreiben oder sich mit dem Weltgeschehen auszukennen sind vorrausgesetzt und müssen nicht geskillt werden.</p>
                                    <p>Ein Wert von 100 Heißt das man kann die Fähigkeit immer problemlos einsetzen (außer vielleicht es kommen erschwerende Umstände hinzu). Ein Wert von bspw. 40 bedeutet das man ihn nur in 40% aller Fälle hinbekommt.</p>
                                    <p>10% von allen Punkten einer bestimmten Kategorie werden auf die Kategorie gerechnet (passiert automatisch). Diese Kategorie wird angewendet wenn ihr eine Fähigkeit einsetzen wollt die ihr gar nicht "geskillt" habt. Das sorgt dafür das man einen Grundwert für die anderen Fähigkeiten bekommt.</p>
                                    <p>80 oder mehr Punkte machen eine Fähigkeit zu einer Meisterfähigkeit. Jede Meisterfähigkeit addiert zusätzlich 10% (ganzer Wert) auf die Kategorie.</p>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="columns">
                        <div class="column is-3 calcValue">
                            <div class="field">
                              <label class="label">Handeln</label>
                              <p class="control">
                                <input class="input calcField" name="handeln-wert" type="text" readonly value="<?php get("handeln-wert") ?>">
                              </p>
                            </div>
                            <?php printSkillRows('handeln'); ?>
                        </div>
                        <div class="column is-3 calcValue">
                          <div class="field">
                              <label class="label">Wissen</label>
                              <p class="control">
                                <input class="input calcField" name="wissen-wert" type="text" readonly value="<?php get("wissen-wert") ?>">
                              </p>
                            </div>
                            <?php printSkillRows('wissen'); ?>
                        </div>
                        <div class="column is-3 calcValue">
                          <div class="field">
                              <label class="label">Interagieren</label>
                              <p class="control">
                                <input class="input calcField" name="interagieren-wert" type="text" readonly value="<?php get("interagieren-wert") ?>">
                              </p>
                            </div>
                            <?php printSkillRows('interagieren'); ?>
                        </div>
                        <div class="column is-3">
                          <strong>Handeln</strong>
                          <p>z.B.: Duellieren, Faustkampf, Verstecken, Angeln, Karate, Klauen</p>
                          <strong>Wissen</strong>
                          <p>z.B.: Bibliothekswesen, Medizin, Latein, Geschichte, Handel, Flora & Fauna</p>
                          <strong>Interagieren</strong>
                          <p>z.B.: Lügen, Beruhigen, Einschüchtern, Menschenkenntnis, Manipulieren, Smalltalk</p>
                        </div>
                    </div>

                    <div class="columns">
                        <div class="column is-9 field">
                          <label class="label">Notizen</label>
                          <p class="control">
                            <textarea class="textarea" placeholder="Notizen" name="notizen"><?php get("notizen") ?></textarea>
                          </p>
                        </div>
                    </div>

                    <div class="field is-grouped">
                      <p class="control">
                        <button type="submit" class="button is-primary" name="bogen-submit" value="save">Speichern</button>
                      </p>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script>
        $(document).ready( function(){
            $(".calcValue").each( function( index, parent ){
                $(this).find(".watchField").on( 'keyup keypress blur change', function( child ){

                    var val = $(this).val();
                    if( val <= 0 || val > 100 ){
                        $(this).addClass("is-danger");
                    }
                    else{
                        $(this).removeClass("is-danger");

                        var sumValue = 0;
                        $(parent).find(".watchField").each( function( i, field ){

                            if( $(field).val() > 0 && $(field).val() <= 100 ){
                                var fieldValue = parseInt( $(field).val() );

                                if( fieldValue >= 80 ){
                                    sumValue += 10;
                                }
                                sumValue += fieldValue * .1;
                            }
                        });

                        $(parent).find('.calcField').val( Math.round( sumValue ) + "%" );
                    }
                });
            });

            $("#player-select").change( function(){
                $("input[name=player-select]").val("1");
                $("#character-form").submit();
            });
        });
    </script>
</body>
</html>
<?php 

    function get( $field )
    {
        global $file;
        if( isset( $file ) && $file != null )
        {
            print( isset( $_POST[ $field ] ) ? $_POST[ $field ] : "" );
        }
        else
        {
            print( isset( $_POST[ $field ] ) ? $_POST[ $field ] : "" );
        }
    }

    function printSkillRows( $name ){
        foreach( range(1, 10) as $index ){

            $value = isset( $_POST[ $name ][ $index ] ) ? $_POST[ $name ][ $index ] : "";
            $valuePoints = isset( $_POST[ $name."_punkte" ][ $index ] ) ? $_POST[ $name."_punkte" ][ $index ] : "";
            $html = "<div class='columns skill-rows'>
                    <div class='column is-9'>
                        <div class='field'>
                            <p class='control'>
                                <input class='input' type='text' name='".$name."[".$index."]' placeholder='Fähigkeit' value='".$value."'>
                            </p>
                        </div>
                    </div>
                    <div class='column is-3'>
                        <div class='field'>
                            <p class='control'>
                                <input class='input watchField' name='".$name."_punkte[".$index."]' type='number' value='".$valuePoints."'>
                            </p>
                        </div>
                    </div>
                </div>";
            print( $html );
        }
    }

?>