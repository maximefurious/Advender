<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../membre/login.php");
    exit;
}

$bdd = new PDO('mysql:host=217.182.207.90;dbname=DBuser2','user2', 'Lyceepassword29');
$username = $_SESSION["username"];
$id = $_SESSION["id"];

?>

<!DOCTYPE html>
<html>
<head lang="fr">
    <meta charset="UTF-8">
    <title>Advender</title>
    <link rel="stylesheet" type="text/css" href="../css/qcm.css">
    <link rel="stylesheet" type="text/css" href="../css/sombre.css">
</head>
<body onload="points()">
    <div class="grid">
        <div id="quiz">

            <h1>Advender</h1>
            <hr style="margin-bottom: 20px">
            <p id="question"></p>
            <p id="result"></p>
            <form method='POST' action='envoi.php'>
                <input type='hidden' name='points' id='points' value=''>
            </form>
            <div class="buttons">
                <button id="btn0"><span id="choice0"></span></button>
                <button id="btn1"><span id="choice1"></span></button>
                <button id="btn2"><span id="choice2"></span></button>
                <button id="btn3"><span id="choice3"></span></button>
            </div>

            <hr style="margin-top: 50px">
            <footer>
                <p id="progress">Question x of y</p>
            </footer>
        </div>
    </div>
    <script type="text/javascript">

        function points() {
            var pts = quiz.score;
            document.getElementById("points").value = pts;
        }

        function Quiz(questions) {
            this.score = 0;
            this.questions = questions;
            this.questionIndex = 0;
        }

        Quiz.prototype.getQuestionIndex = function() {
            return this.questions[this.questionIndex];
        }

        Quiz.prototype.guess = function(answer) {
            if(this.getQuestionIndex().isCorrectAnswer(answer)) {
                this.score++;
            }

            this.questionIndex++;
        }

        Quiz.prototype.isEnded = function() {
            return this.questionIndex === this.questions.length;
        }


        function Question(text, choices, answer) {
            this.text = text;
            this.choices = choices;
            this.answer = answer;
        }

        Question.prototype.isCorrectAnswer = function(choice) {
            return this.answer === choice;
        }


        function populate() {
            if(quiz.isEnded()) {
                showScores();
                console.log(quiz.score);
                points();
            }
            else {
// show question
var element = document.getElementById("question");
element.innerHTML = quiz.getQuestionIndex().text;

// show options
var choices = quiz.getQuestionIndex().choices;
for(var i = 0; i < choices.length; i++) {
    var element = document.getElementById("choice" + i);
    element.innerHTML = choices[i];
    guess("btn" + i, choices[i]);
}

showProgress();
}
};

function guess(id, guess) {
    var button = document.getElementById(id);
    button.onclick = function() {
        quiz.guess(guess);
        populate();
    }
};

function showProgress() {
    var currentQuestionNumber = quiz.questionIndex + 1;
    var element = document.getElementById("progress");
    element.innerHTML = "Question " + currentQuestionNumber + " of " + quiz.questions.length;
};

function showScores() {
    var gameOverHTML = "<h1>Result</h1>";
    gameOverHTML += "<h2 id='score'> Your scores: " + quiz.score + "</h2>";
    gameOverHTML += "<form name='myform' method='POST' action='ajax.php'>"
    gameOverHTML += "<input type='hidden' name='points' id='points' value=''>"
    gameOverHTML += "<center><input id='btn3' type='submit'></center>";
    gameOverHTML += "</form>";
    var element = document.getElementById("quiz");
    element.innerHTML = gameOverHTML;

};


// Question sur le thème de l'Histoire
A0101001 = new Question("Quelle est le nom de la guerre qui s'est déroulée de 1756 à 1763 ?", ["la guerre des Trente ans", "La drole de guerre","La guerre de Sept ans", "La seconde guerre mondiale"], "La guerre de Sept ans")
A0101002 = new Question("Qui à été le mentor d'Hitler?", ["Fiodor Dostoievski", "Dietrich Eckart", "Léon Tolstoi", "Thomas Hobbes"], "Dietrich Eckart")
A0101003 = new Question("Quand a eu lieu l'affaire Dreyfus?", ["de 1896 à 1903", "de 1894 a 1906","de 1903 a 1907", "de 1915 a 1920"], "de 1894 a 1906")
A0101004 = new Question("Quand a été tué Malcolm X", ["1965", "1966", "1962", "1974"], "1965")
A0101005 = new Question("Par qui a été aboli l'esclavage", ["Washington", "Lincoln", "Roosevelt 1er", "Huxley"], "Lincoln")
A0101006 = new Question("Quel est l'empereur Romain qui à été tué par son fils ?", ["Marc-Aurèle", "Auguste","Caligula", "Jules César"], "Jules César")
A0101007 = new Question("Quand la France à t-elle perdue le Québec", ["1766", "1763", "1785", "1762"], "1763")
A0101008 = new Question("Quel est le célèbre général Francais qui créa le code-civil?", ["Louis XIII", "Napoléon Bonaparte","Napoléon III", "Charles de Gaulle"], "Napoléon Bonaparte")
A0101009 = new Question("Qu'es ce que l'indigénat", ["Une législation d'exception", "Un texte de loi", "Un article", "Une constitution"], "Une législation d'exception")
A0101010 = new Question("A quel siecle est née l'islam?", ["XIe", "VIe", "VIIe", "XVIIe"], "VIe")
A0101011 = new Question("Quel est le premier pharaon?", ["Ramses", "Narmer", "Toutankhamon", "Ramses II"], "Narmer")
A0101012 = new Question("Qui est Lénine?", ["Un Tsar russe", "Un révolutionnaire soviétique", "Un paysage", "Un banquier écossais"], "Un révolutionnaire soviétique")
A0101013 = new Question("Par qui Marseille à été fondé?", ["Les romains", "Les Huns", "Les grecques", "les macédoniens"], "Les grecques")
A0101014 = new Question("Quand a eu lieu la révolution Irlandaise", ["1905-1915", "1919-1921", "1625-1637", "1956-1963"], "1919-1921")
A0101015 = new Question("A quel fréquence à été construite la muraille de Chine?", ["Sur plusieurs siècles", "VI av J-C", "Ve", "Ie "], "Sur plusieurs siècles")
A0101016 = new Question("Quand à été élut Francois Mitterrand", ["1981 et 1988", "1958", "1965 et 1972", "2007"], "1981-1988")

// Question sur le thème Philosophique
A0201001 = new Question("Quel est le courant de Jean Paul Sartre?", ["l'existentialisme", "le nihilisme","l'hédonisme", "l'anarchisme"], "l'existentialisme")
A0201002 = new Question("Nietzsche est un philosophe?", ["Allemand", "Francais", "Polonais", "Autrichien"], "Allemand")
A0201003 = new Question("qui conceptualisa la volonté de puissance?", ["Platon", "De Corte","Schopenhaouer", "Nietzsche"], "Nietzsche")
A0201004 = new Question("L'Homme selon Sartre est...", ["condamné à etre libre", "voué à l'échec", "materialiste", "un loup pour l'Homme"], "condamné à etre libre")
A0201005 = new Question("Qui est le philosophe oratoire", ["Socrate", "Aristote", "Sénèque", "Diogène"], "Socrate")
A0201006 = new Question("Quelle est la philosophie d'Albert Camus ?", ["l'absurde", "le stoicisme","l'épicursime", "le nihilisme"], "l'absurde")
A0201007 = new Question("Qui est Jean-Jacques Rousseau", ["un philosophe", "un plombier", "un garagiste", "un dramaturge"], "un philosophe")
A0201008 = new Question("Qui à écrit l'étranger?", ["Alexandre Dumas", "Albert Camus","Victor Hugo", "Milan Kundera"], "Albert Camus")
A0201009 = new Question("Qui à fait comme exemple la Pierre? ", ["Spinoza", "Descartes", "Bergson", "Popper"], "Spinoza")
A0201010 = new Question("Qu'es ce que le dernier des Hommes?", ["un film de 1924", "un roman de Voltaire", "un recueil de Victor Hugo", "une maxime"], "un film de 1924")
A0201011 = new Question("Qui à écrit l'insoutenable légereté de l'etre", ["Stendhal", "Zola", "Kundera", "Nietzsche"], "Kundera")
A0201012 = new Question("Lequel de ces personnages est Allemand?", ["Guillaume Apollinaire", "Milan Kundera", "Franz Kafka", "Primo Levi"], "Franz Kafka")
A0201013 = new Question("Par qui La métamorphose a t-elle été écrite?", ["Franz Kafka", "Stendhal", "Marcel Proust", "Pierre-Jospeh Proudhon"], "Franz Kafka")
A0201014 = new Question("Qui est Kant", ["un philosophe Allemand", "un politologue juif", "un pompier néo-zélandais", "un archéologue hongrois"], "un philosphe Allemand")

// Question sur le thème des Sciences
A0301001 = new Question("De quelle forme est une équation homogène ?", ["ax + b", "y'+ ay = 0","y' + ay = b", "2(a+b) = c"], "y' + ay = 0")
A0301002 = new Question("Qui est l'auteur de l'Hotel infini?", ["Poincaré", "Hilbert", "Descartes", "Grigori Perelman"], "Hilbert")
A0301003 = new Question("Qui est le père de la physique quantique?", ["Richard Feynman", "John von Neumann","Max Planck", "Albert Einstein"], "Max Planck")
A0301004 = new Question("Trouvez le nombre d'or", ["1.61803398875", "3.14159265359", "2", "10^21"], "1.61803398875")
A0301005 = new Question("Par qui Enigma à telle été déchiffrée", ["Alan Turing", "George Gamow", "Stephen Hawking", "Raymond Queneau"], "Alan Turing")
A0301006 = new Question("Quel est le premier élément periodique ?", ["l'Hélium", "le carbone","l'Hydrogène", "le Fer"], "l'Hydrogène")
A0301007 = new Question("Qui est Schrodinguer", ["un physicien Allemand", "un astronome hollandais", "un garagiste vietnamien", "un dramaturge polonais"], "un physicien Allemand")
A0301008 = new Question("On attribue à ...., le théorème qui affirme que, dans un triangle rectangle, le carré de l'hypoténuse est égal à la somme des carrés des deux autres côtés... et réciproquement : si cette égalité est vraie, le triangle est rectangle.", ["Thalès", "Pythagore","Bernouilli", "Archimède"], "Pythagore")
A0301009 = new Question("Qu'esce que Archimède à conceptualisé ? ", ["Il a crié Eureka", "Il est le fondateur la physique ancienne", "Il a donné un encadrement de Pi d'une remarquable précision", "Il a inventé la géometrie riemanienne"], "Il a donné un encadrement de Pi d'une remarquable précision")
A0301010 = new Question("Quelles sont les cellules responsables de l'immunité du corps humain ?", ["les globules rouges", "les plaquettes", "les globules blancs", "le glucose"], "les globules rouges")
A0301011 = new Question("A quoi est due la couleur rouge du sang ?", ["Les thrombocytes", "l'hémoglobine", "les leucocytes", "le plasma"], "l'hémoglobine")
A0301012 = new Question("Parmi les muscles suivants, lesquels sont expirateurs (permettent l'expiration forcée)?", ["Diaphragme", "Pectoraux", "Abdominaux", "Quadriceps"], "le Diaphragme")
A0301013 = new Question("Il a fait des recherches sur les bactéries du ver à soie, le choléra de la poule mais il est célèbre pour son vaccin contre la rage" ,["Henri Becquerel", "Louis Pasteur", "Georges Cuvier", "Marie Curie"], "Louis Pasteur")
A0301014 = new Question("Qui à découvert le vaccin", ["Louis Pasteur", "Robert Koch", "Joseph Lister", "Alexander Fleming"], "Louis Pasteur")
A0301015 = new Question("Qui à découvert la péniciline", ["Louis Pasteur", "Robert Koch", "Joseph Lister", "Alexander Fleming"], "Alexander Fleming")
A0301016 = new Question("Qui à pensé la théorie de l'évolution?", ["Thomas Edison", "Charles Darwin", "Robert Hooke", "Francis Darwin"], "Charles Darwin")

var philo = [
A0201001,A0201002,A0201003,A0201004,A0201005,A0201006,A0201007,A0201008,A0201009,A0201010,A0201011,A0201012,A0201013,A0201014
];

var histoire = [
A0101001,A0101002,A0101003,A0101004,A0101005,A0101006,A0101007,A0101008,A0101009,A0101010,A0101011,A0101012,A0101013,A0101014,A0101015,A0101016
];

var sciences = [
A0301001,A0301002,A0301003,A0301004,A0301005,A0301006,A0301007,A0301008,A0301009,A0301010,A0301011,A0301012,A0301013,A0301014,A0301015,A0301016
];


b=philo[Math.floor(Math.random() * philo.length)];
c=histoire[Math.floor(Math.random() * histoire.length)];
d=sciences[Math.floor(Math.random() * sciences.length)];
e=philo[Math.floor(Math.random() * philo.length)];
f=histoire[Math.floor(Math.random() * histoire.length)];

// create questions here
var questions = [
b,c,d,e,f
];

// create quiz
var quiz = new Quiz(questions);

// display quiz
populate();



</script>
</body>
</html>
