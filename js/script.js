function FormValidation(){

}
function SwitchPic(){

}
const ensembleReponse1 = new Set(["Thomas shelby","thomas Shelby", "Thomas Shelby","THOMAS SHELBY","thomas shelby"]);

function VerifQuestion1(){
    reponse=document.getElementById("personnageQuestion1").value;
    console.log(reponse);
    if (ensembleReponse1.has(reponse)){
        document.getElementById("personnageQuestion1").className='LabelTexteValide';
    }
    else{
        document.getElementById("personnageQuestion1").className='LabelTexteInvalide';
    }
}