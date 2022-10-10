// $(document).ready(()=>{
//     //brisanje kategorije
//     $(document).on('click','.deleteCategory',function(e){
//         e.preventDefault();
//         let idCat = {
//             id: $(this).data('idcat')
//         }
//         ajaxSendData("models/delete-category.php",idCat,function(result){
//             displayCategories(result);
//         })
//     })
// })



// //AJAX callback 
// function ajaxSendData(url,data,result){
//     $.ajax({
//         url: url,
//         method: "post",
//         dataType : "json",
//         data: data,
//         success: result,
//         error: (xhr)=>{console.log(xhr)}
//     })
// }


// //prikazivanje kategorija
// function displayCategories(categories){
//     let html = "";
//     if(categories.length==0){
//         html+="<p class='alert alert-danger my-3'>There are no categories set</p>"
//     }
//     else{
//         html=`
//         <table class="table">
//         <tr>
//             <th>Sr No.</th>
//             <th>Date&Time</th>
//             <th>Category Name</th>
//             <th>Creator Name</th>
//             <th>Delete</th>
//         </tr>`;
//         let SrNo =1;
//         for(let category of categories){
//             let dateArr = category.datetime.split(" ");
//             let date = dateArr[0].split("-");
//             let dateFormat = date[2]+"."+date[1]+"."+date[0]+".";
//             html+=`
//             <tr>
//                    <td>${SrNo}.</td>
//                    <td>${dateFormat}></td>
//                    <td>${category.name}</td>
//                    <td>${category.creator}</td>
//                   <td><a href="#" data-idcat="<?=$catObj->id?>" class="deleteCategory"><i class="fas fa-trash"></i></a></td>
//                   <td></td>
//                </tr>
//             `;
//             SrNo++;
//         }
//         html+="</table>";
//         }
//         $("categoriesTable").html(html) 
// }