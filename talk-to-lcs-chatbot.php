
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="LCS Online Enrollment System">
	  <meta name="keywords" content="LCS Online Enrollment System">
  	<meta name="author" content="Marlon Tercero">
    <title>Lucban Christian School | Welcome</title>
    <link rel="icon" type="image/gif/png" href="./img/lcs_logo.png"/>
    <link rel="stylesheet" href="./css/style.css">
  </head>
  <body>
    <header>
      <div class="container">
        <div id="branding">
          <h1><span class="highlight">Lucban</span> Christian School</h1>
        </div>
        <nav>
           <ul class = "main-menu">
            <li class="current"><a href="home.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="services.php">Services</a>
                <ul class="sub-menu">
                  <li><a href="announcements.php">Announcements</a></li>
                  <li><a href="tuition-inquiry.php">Tuition Fees</a></li>
                  <li><a href="enroll-new.php">Enroll as New Student/Transferee</a></li>
                  <li><a href="enroll-old.php">Enroll as Old Student</a></li>
                  <li><a href="check-enroll-status.php">Enrollment Status</a></li>
                  <li><a href="view-student-payments.php">View Payments</a></li>
                  <li><a href="talk-to-lcs-chatbot.php">LCS Chatbot</a></li>
                </ul></li>

              </li>

              
          </ul>
        </nav>
      </div>
    </header>
    <style>
            body { 
              color: #EEEFF5; font-weight: auto; font-size: 14px; background: #09034F; 
              background-image: url("/lcs/img/girl.png"); background-repeat: repeat-y; 
            }
            span { 
              color: #F9F4F5; 
            } 
            ::-webkit-input-placeholder { 
              color: #F70236 
            }
            #main { 
              position: fixed; top: 60%; right: 100px; width: 400px; 
              border: 0px solid #421; padding: 40px; 
            }
            #main div { 
              margin: 10px; 
            } 
            #input { 
              border: 0; background: #F7F7F9; padding: 5px; border: 1px solid #421; 
            }
</style>
</head>
<body>

<div>
  <p style = 'margin-left: 700px; margin-top: 30px;'>Welcome to the LCS Chatbot Assistance! My name is Robo and unfortunately, I am still being worked on to answer your queries. For your basic inquiry, you about enrollment, just type: "tuition", "enrollment status", "enrollment date", "school name", "enroll as new student", "enroll as old student", "view payment" .</p>
</div>
<div id="main" style = 'border: .5px solid gray;' >
  <div style = 'height: 30px;'><b>Visitor: </b><span id="user"></span></div>
  <div style = 'height: 50px; '><b>LCS Chatbot:</b> <span id="chatbot"></span></div>
  <div><input id="input" style = 'width: 400px; height: 20px; border-radius: 5px 10px;' type="text" placeholder="Ask me about registration.." autocomplete="off"/></div>
</div>
<script type="text/javascript">
var trigger = [
  ["hi","hey","hello"], 
  ["how are you", "how is life", "how are things"],
  ["what are you doing", "what is going on"],
  ["how old are you"],
  ["who are you", "are you human", "are you bot", "are you human or bot"],
  ["who created you", "who made you"],
  ["your name please",  "your name", "may i know your name", "what is your name"],
  ["i love you"],
  ["happy", "good"],
  ["bad", "bored", "tired"],
  ["help me", "tell me story", "tell me joke"],
  ["ah", "yes", "ok", "okay", "nice", "thanks", "thank you"],
  ["bye", "good bye", "goodbye", "see you later"],
  ["tuition"],
  ["enrollment status"],
  ["enrollment date"],
  ["school name"],
  ["enroll as new student"],
  ["enroll as old student"],
  ["view payment"]


];
var reply = [
  ["Hi","Hey","Hello"], 
  ["Fine", "Pretty well", "Fantastic"],
  ["Nothing much", "About to go to sleep", "Can you guest?", "I don't know actually"],
  ["I am 1 day old"],
  ["I am just a bot", "I am a bot. What are you?"],
  ["Kani Veri", "My God"],
  ["My name is Robo!", "Robo!"],
  ["I love you too", "Me too"],
  ["Have you ever felt bad?", "Glad to hear it"],
  ["Why?", "Why? You shouldn't!", "Try watching TV"],
  ["I will", "What about?"],
  ["Tell me a story", "Tell me a joke", "Tell me about yourself", "You are welcome"],
  ["Bye", "Goodbye", "See you later"],
  ["<a href=http://tercerotaton.cf/lcs/tuition-inquiry.php> Click here</a>, then choose what grade level you want to see. "],
  ["<a href=http://tercerotaton.cf/lcs/check-enroll-status.php> Click here </a>, but you must be logged in!"],
  ["Opening of enrollment starts January!"],
  ["Lucban Christian School"],
  ["<a href=http://tercerotaton.cf/lcs/enroll-new.php> Click here</a>, then fill out the form. But you must be logged in. "],
  ["<a href=http://tercerotaton.cf/lcs/enroll-old.php> Click here</a>, then fill out the form. But you must be logged in. "],
  ["<a href=http://tercerotaton.cf/lcs/view-student-payments.php> Click here</a>, but you must be logged in. "]
  
];
var alternative = ["I dont have an answer to that right now.", "I am not sure about what you're asking."];
document.querySelector("#input").addEventListener("keypress", function(e){
  var key = e.which || e.keyCode;
  if(key === 13){ //Enter button
    var input = document.getElementById("input").value;
    document.getElementById("user").innerHTML = input;
    output(input);
  }
});
function output(input){
  try{
    var product = input + "=" + eval(input);
  } catch(e){
    var text = (input.toLowerCase()).replace(/[^\w\s\d]/gi, ""); //remove all chars except words, space and 
    text = text.replace(/ a /g, " ").replace(/i feel /g, "").replace(/whats/g, "what is").replace(/please /g, "").replace(/ please/g, "");
    if(compare(trigger, reply, text)){
      var product = compare(trigger, reply, text);
    } else {
      var product = alternative[Math.floor(Math.random()*alternative.length)];
    }
  }
  document.getElementById("chatbot").innerHTML = product;
  speak(product);
  document.getElementById("input").value = ""; //clear input value
}
function compare(arr, array, string){
  var item;
  for(var x=0; x<arr.length; x++){
    for(var y=0; y<array.length; y++){
      if(arr[x][y] == string){
        items = array[x];
        item =  items[Math.floor(Math.random()*items.length)];
      }
    }
  }
  return item;
}
function speak(string){
  var utterance = new SpeechSynthesisUtterance();
  utterance.voice = speechSynthesis.getVoices().filter(function(voice){return voice.name == "Robo";})[0];
  utterance.text = string;
  utterance.lang = "en-US";
  utterance.volume = 1; //0-1 interval
  utterance.rate = 1;
  utterance.pitch = 2; //0-2 interval
  speechSynthesis.speak(utterance);
}
</script>
<div>
   

  </div>
  </body>
</html>
