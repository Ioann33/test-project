let performer = document.querySelector('.performer')
let manager = document.querySelector('.manager')
let boss = document.querySelector('.boss')
let save = document.querySelector('.save')
let role = document.querySelector('.role')

let resArr = []
let count = 0

function showList(arr) {
    let list = document.querySelector('.list');
    list.innerText = '';
    for (let item of arr) {

        list.insertAdjacentHTML('beforeend', `
         <div class="card" style="width: 18rem; margin: 20px">
                            <div class="card-body">
                                <h4 class="card-title">${item['title']}</h4>
                                <p class="card-text">${item['body']}</p>
                            </div>
                        </div>
        `);
    }
}

function saveNotes(data){
    let newObg = {};
    for (let item of data){
        newObg[item['id']] = Object.assign({},item)
    }
    fetch('http://127.0.0.1:8000/api/saveNotes',{
        method: 'POST',
        body: JSON.stringify(newObg),
        headers: {
            'Content-Type' : 'application/json',
        }
    }).then(response => response.status)
        .then(response => {
            if (response === 200){
                alert('Записи успешно сохранены')
                resArr = [];
                showList(resArr)
            }
        })
}

function getData(btn){
    let newPost = [];
    count++
    fetch(`http://jsonplaceholder.typicode.com/posts/${count}`)
        .then(response =>response.json())
        .then(response => {
            newPost['id'] = response.id
            newPost['title'] = response.title
            newPost['body'] = response.body
            newPost['user'] = role.value
            newPost['button'] = btn
            resArr.push(newPost)
            showList(resArr)
        })
}


performer.onclick = function (){
    getData('Кнопка performer')

}
if (manager != null){
    manager.onclick = function (){
        getData('Кнопка manager')
    }
}

if (boss != null){
    boss.onclick = function (){
        getData('Кнопка boss')
    }
}


save.onclick = function (){

    saveNotes(resArr)
}
