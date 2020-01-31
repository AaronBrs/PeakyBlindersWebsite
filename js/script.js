
let listePersonnages = new Array('Grace Burgess','Polly Gray','Arthur Shelby','Michael Gray','John Shelby');
let indicePersonnages = new Array(1,3,0,2,4);

function FormValidation(){
    VerifQuestion1();
    VerifQuestion2();
    VerifQuestion3();
    VerifQuestion4();

}
function SwitchPic(){
}
const ensembleReponse1 = new Set(["Thomas shelby","thomas Shelby", "Thomas Shelby","THOMAS SHELBY","thomas shelby"]);

function VerifQuestion1(){
    reponse=document.getElementById("personnageQuestion1").value;
    if (ensembleReponse1.has(reponse)){
        document.getElementById("personnageQuestion1").className='LabelTextCorrect';
    }
    else{
        document.getElementById("personnageQuestion1").className='LabelTextWrong';
    }
}
function VerifQuestion2(){
  /*Récupère la valeur de la case sélectionnée*/
  if (document.getElementById("ANG").checked){
    reponse=document.getElementById("ANG").value;
  }
  else if(document.getElementById("ECO").checked){
    reponse=document.getElementById("ECO").value;
  }
  else if(document.getElementById("IRL").checked){
    reponse=document.getElementById("IRL").value;
  }
  else if(document.getElementById("PDG").checked){
    reponse=document.getElementById("PDG").value;
  }
  /*Si la valeur est Angleterre*/
  if (reponse=="Angleterre"){
    document.getElementById('ReponseDeux').innerHTML="<p> Bravo ! </p>";
    document.getElementById('ReponseDeux').className='BonneReponse';
  }
  else{
    document.getElementById('ReponseDeux').innerHTML="<p> Mauvaise réponse ! </p>";
    document.getElementById('ReponseDeux').className='MauvaiseReponse';
  }
}

function VerifQuestion3(){
  if (
    (document.getElementById("ThSh").checked)&&
    (document.getElementById("MiGr").checked)&&
    (document.getElementById("ArSh").checked)&&
    (document.getElementById("JoSh").checked)&&
    (!(document.getElementById("JoDo").checked))&&
    (!(document.getElementById("BiKi").checked))&&
    (!(document.getElementById("FrTh").checked))&&
    (!(document.getElementById("AlSo").checked))
     )
  {
    document.getElementById('ReponseTrois').innerHTML="<p> Bonne réponse ! </p>";
    document.getElementById('ReponseTrois').className='BonneReponse';
  }
  else{
    document.getElementById('ReponseTrois').innerHTML="<p> Essaye encore ! </p>";
    document.getElementById('ReponseTrois').className='MauvaiseReponse';
  }
}

function VerifQuestion4(){
    for (let i=0; i<listePersonnages.length; i++){
      if((document.forms['Questionnaire'].elements['ListePerso'+(i+1)].selectedIndex-1)==indicePersonnages[i]){
        document.getElementById('PersoNumero'+(i+1)).className='ValeurListeCorrect';
      }
      else{
        document.getElementById('PersoNumero'+(i+1)).className='ValeurListeIncorrect';
      }
    }
}

function selectionPersonnage(s0){
    for(let i=0;i<listePersonnages.length;i++){//vérification sur toutes les valeurs de la liste
      let s=document.forms['Questionnaire'].elements['ListePerso'+(i+1)]; //s prend la valeur un élément de la liste
      if ((s!=s0)&&(s.options[s.selectedIndex].text==s0.options[s0.selectedIndex].text)){//si s est déjà dans la liste
        s.selectedIndex=0;//réinitialise s
      }
    }
  }
  