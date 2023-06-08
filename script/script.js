const formList = document.getElementById("formSocials");
const addBtn = document.getElementById("add");
console.log(formList);

const li_sample = formList.children[0].cloneNode(true);


addBtn.addEventListener("submit",(e)=>{
    e.preventDefault()
})


function setId(element,id){
    const labels = element.getElementsByTagName("label")
    
    const select = element.getElementsByTagName("select")[0]
    select.setAttribute("id","socialType"+id)
    select.setAttribute("name","socialType"+id)
    labels[0].setAttribute("for","socialType"+id)

    const input = element.getElementsByTagName("input")[0]
    input.setAttribute("id","socialUrl"+id)
    input.setAttribute("name","socialUrl"+id)
    labels[1].setAttribute("name","socialUrl"+id)
}
function setAllIds(){
    for (let i = 0; i < formList.children.length; i++) {
        const element = formList.children[i];
        setId(element,i)        
    }
}

addBtn.addEventListener("click",(e)=>{
    e.preventDefault()
    const el = li_sample.cloneNode(true)
    formList.appendChild(el)

    const delBtn = el.getElementsByTagName("button")[0];
    console.log(delBtn);
    delBtn.classList.remove("first")
    delBtn.addEventListener("submit",(e)=>{
        
        e.preventDefault()
        })
    delBtn.addEventListener("click",(e)=>{ 
    e.preventDefault()
    e.target.parentElement.parentElement.parentElement.remove()
    setAllIds()
    })
    setAllIds()
})

