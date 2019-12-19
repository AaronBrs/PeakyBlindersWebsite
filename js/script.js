
let listePersonnages = new Array('Grace Burgess','Polly Gray','Arthur Shelby','Michael Gray','John Shelby');
let indicePersonnages = new Array(1,3,0,2,4);

function FormValidation(){
    VerifQuestion1();
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
    reponse=document.getElementById("ANG").value;
    if (reponse=="Angleterre"){
        
    }
    /*
    if (document.getElementById("ANG").checked){

    }
    */
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
  