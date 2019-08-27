<?php
session_start();
$total = 12;
$page = filter_input(INPUT_GET, 'p', FILTER_SANITIZE_NUMBER_INT);
if (empty($page)) {
  session_destroy();
  $page = 1;
}

if (isset($_POST['word'])) {
  $_SESSION['word'][$page-1] = filter_input(INPUT_POST, 'word', FILTER_SANITIZE_STRING);
}

if ($page > $total) {
    header('location: story.php');
    exit;
}

include 'inc/header.php';

echo "<h1>Step $page of $total</h1>";

echo '<form method="post" action="play.php?p='.($page+1).'">';
echo '<div class="form-group form-group-lg">';

switch ($page) {
  //name
    case 2:
        echo '
            <label class="control-label h2" for="word">Enter your name</label>
            <input class="form-control" type="text" name="word" id="word" placeholder="Name">
            ';
        break;
  //adj1
    case 3:
        echo '
            <label class="control-label h2" for="word">Enter a good adjective of the highest order (bestest, wickedest, coolest)</label>
            <input class="form-control" type="text" name="word" id="word" placeholder="adjective">
            <p class="help-block">An adjective is a word or phrase naming an attribute, added to a noun to modify or describe it.</p>
            ';
        break;
  //adj2
    case 4:
        echo '
            <label class="control-label h2" for="word">Enter a good adjective that is superior. (cooler, better)</label>
            <input class="form-control" type="text" name="word" id="word" placeholder="adjective">
            <p class="help-block">An adjective is a word or phrase naming an attribute, added to a noun to modify or describe it.</p>
            ';
        break;
  //time
    case 5:
        echo '
            <label class="control-label h2" for="word">Enter how many years you\'ve been alive/label>
            <input class="form-control" type="number" name="word" id="word" placeholder="years">            ';
        break;
  //hometown
    case 6:
        echo '
            <label class="control-label h2" for="word">Enter your hometown</label>
            <input class="form-control" type="text" name="word" id="word" placeholder="hometown">
            ';
        break;
  //verb1
    case 7:
        echo '
            <label class="control-label h2" for="word">Enter a verb ending in ING</label>
            <input class="form-control" type="text" name="word" id="word" placeholder="verb">
            <p class="help-block">A verb is a doing word, describing an action, state or occurence.</p>
            ';
        break;
  //verb2
    case 8:
        echo '
            <label class="control-label h2" for="word">Enter a verb ending in ING</label>
            <input class="form-control" type="text" name="word" id="word" placeholder="verb">
            <p class="help-block">A verb is a doing word, describing an action, state or occurence.</p>
            ';
        break;
  //verb3
    case 9:
        echo '
            <label class="control-label h2" for="word">Enter a verb ending in ING</label>
            <input class="form-control" type="text" name="word" id="word" placeholder="verb">
            <p class="help-block">A verb is a doing word, describing an action, state or occurence.</p>
            ';
        break;
  //favperson
    case 10:
        echo '
            <label class="control-label h2" for="word">Enter your favourite person living or dead famous or not</label>
            <input class="form-control" type="text" name="word" id="word" placeholder="noun">
            ';
        break;
  //adj3
    case 11:
        echo '
            <label class="control-label h2" for="word">Enter an adjective</label>
            <input class="form-control" type="text" name="word" id="word" placeholder="noun">
            <p class="help-block">An adjective is a word or phrase naming an attribute, added to a noun to modify or describe it.</p>
            ';
        break;
  //gender
    case 12:
        echo '
            <label class="control-label h2" for="word">Select if you\'re male or female</label>
            <select name="word">
            <option value="male" name="male" id="male">Male</option>
            <option value="female" name="female" id="female">Female</option>
            </select>
           ';
        break;
  //peeps
    default:
        echo '
            <label class="control-label h2" for="word">Enter a word for a group of your friends</label>
            <input class="form-control" type="text" name="word" id="word" placeholder="adjective">
            <p class="help-block">Example: Peeps, homies, amigos</p>
            ';
        break;
}
echo '</div>
  <button type="submit" class="btn btn-default btn-lg">Submit</button>
</form>
';
include 'inc/footer.php';
