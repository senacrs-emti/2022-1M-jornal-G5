var login = ""
var interno = ""
var sair = ""

var login2 = ""
var interno2 = ""
var sair2 = ""
var menubotao = ""
var navbar = ""

var botao_clicado = false

function redirect(id){
    window.location.href = `posts.php?id=${id}`
}

function botao_menu(){
    if(botao_clicado){
        navbar.classList.remove('d-flex')
        navbar.classList.add('d-none')

        if(login2 != null){
            login2.classList.add('d-none')
        }
        if(interno2 != null){
            interno2.classList.add('d-none')
        }
        if(sair2 != null){
            sair2.classList.add('d-none')
        }

        botao_clicado = false
    }else{
        navbar.classList.remove('d-none')
        navbar.classList.add('d-flex')

        if(login2 != null){
            login2.classList.remove('d-none')
        }
        if(interno2 != null){
            interno2.classList.remove('d-none')
        }
        if(sair2 != null){
            sair2.classList.remove('d-none')
        }

        botao_clicado = true
    }
}

function resize(){
    let largura = window.screen.width;
    if(largura <= 767){
        if(login != null){
            login.classList.add('d-none')
        }
        if(interno != null){
            interno.classList.add('d-none')
        }
        if(sair != null){
            sair.classList.add('d-none')
        }

        if(!botao_clicado){
            navbar.classList.remove('d-flex')
            navbar.classList.add('d-none')
        }
        menubotao.classList.remove('d-none')
    }else{
        if(login != null){
            login.classList.remove('d-none')
        }
        if(interno != null){
            interno.classList.remove('d-none')
        }
        if(sair != null){
            sair.classList.remove('d-none')
        }

        navbar.classList.remove('d-none')
        navbar.classList.add('d-flex')
        menubotao.classList.add('d-none')
        if(botao_clicado){
            if(login2 != null){
                login2.classList.add('d-none')
            }
            if(interno2 != null){
                interno2.classList.add('d-none')
            }
            if(sair2 != null){
                sair2.classList.add('d-none')
            }
            
            botao_clicado = false
        }
    }    
}

setTimeout(()=>{
    login = document.getElementById('botaologin')
    interno = document.getElementById('botaointerno')
    sair = document.getElementById('botaosair')

    login2 = document.getElementById('botaologin2')
    interno2 = document.getElementById('botaointerno2')
    sair2 = document.getElementById('botaosair2')

    menubotao = document.getElementById('botaomenu')
    navbar = document.getElementById('menu_nav')

    resize()
},0)