 function cargarSelects() {
        //----
//        construirSelectSexo("Inputsexo");
//        construirSelectSangre("Inputgrupo_sanguineo");
//        construirSelectEstadoCivil("Inputestado_civil");
//        construirSelectNivelVigilancia("Inputnivel_vigilancia_id");
//        construirSelectNivelVigilancia_p("Inputnivel_vigilancia_id_p");
//        construirSelectTipoVigilancia("Inputtipo_vigilancia_id");
//        //------
//        construirSelectNivelVigilancia("Inputnivel_vigilancia");
//        construirSelectNivelAcademico("Inputnivel_academico");
//        //------  
//        construirSelectSalud("Inputsalud");
//        construirSelectPension("Inputpension");
//        //------ 
//        //------ 
//        construirSelectBanco("Inputbanco_nombre");
//        //-----
//        construirSelectSupervigilancia("Inputcarnet_supervigilancia_idcarne");
//        
        cargarePS("Inputpersona_eps");
      }

//      function construirSelectSexo(idSexo){
//        $.get('../../../generales/back/controller/sexo/SexoList.php',function(depa){
//          var mySelect=document.getElementById(idSexo);
//          removeAllChildren(mySelect);
//           mySelect.appendChild(createOPTION(-1,'SELECCIONE'));
//          depa = JSON.parse(depa);
//         for (var i = 1 ; i < depa.length; i++) {
//              mySelect.appendChild(createOPTION(depa[i].idsexo,depa[i].sexo_descripcion));
//            }  
//          
//        });
//      }

     function cargarePS(idSexo){      
     //   $.get('../back/controller/Eps_list.php',{'area':Area},function(depa){      
        $.get('../back/controller/Eps_list.php',function(depa){      
          
          var mySelect=document.getElementById(idSexo);
          removeAllChildren(mySelect);
         // mySelect.appendChild(createOPTION(-1,'SELECCIONE'));
          depa = JSON.parse(depa);
         for (var i = 1 ; i < depa.length; i++) {
              mySelect.appendChild(createOPTION(depa[i].eps_id,depa[i].eps_nombre));
            }  
          
        }); 
      }



