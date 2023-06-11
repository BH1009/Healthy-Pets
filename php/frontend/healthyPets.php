<?php 
    session_start();
    if(!isset($_SESSION['usuario'])) {
        echo '
            <script>
                alert("Debes iniciar sesion");
                window.location ="../../index.html";
            </script>   
        ';
        session_destroy();
        die();
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Healthy pets - usuario</title>
    <link rel="stylesheet" href="../../css/healthyPets.css">
</head>
<body>
    <section class="hero">
        <div class="hero__container container">
            <nav class="nav">
                <div class="flex-nav">
                    <div class="nav-header">
                        <h1 class="logo--text"><span>H</span>elthy <span>P</span>ets</h1>
                        <button class="nav-toggle" id="navToggle">
                            <i class="fa-solid fa-bars"></i>
                        </button>
                    </div>
                    <ul class="links" id="links">
                        <li class="link"><a href="#hero" class="link-hover">Inicio</a></li>
                        <li class="link"><a href="#servicios" class="link-hover">Servicios</a></li>
                        <li class="link"><a href="#dogs" class="link-hover">Perros</a></li>
                        <li class="link"><a href="#gatos" class="link-hover">Gatos</a></li>
                        <li class="link"><a href="../backend/cerrar_sesion.php" class="link-hover">Cerrar sesion</a></li>
                        
                    </ul>
                </div>
            </nav>
    
            <div class="hero__content" id="hero">
                <div class="copy">
                    <h1 class="copy__title">¿Qué le pasa </h1>
                    <h1 class="copy__title copy__title--active">a mi mascota?</h1>
                    <p class="copy__paragraph">
                    Descubre que enfermedades puede tener tu mascota<span class="color--active">.</span> Además, encuentra
                        algunas curiosidades acerca de tu perro o tu gato<span class="color--active">.</span>
                    </p>
                    <a href="#servicios" class="btn">Buscar enfermedades</a>
                </div>
            </div>
            <img src="../../imagenes/perro-1.jpg" class="hero__img"/>
            <picture class="bg--bubble bg--bubble--1"></picture>
            <picture class="bg--bubble bg--bubble--2"></picture>
            <picture class="bg--bubble bg--bubble--3"></picture>
            <picture class="bg--bubble bg--bubble--4"></picture>
            <picture class="bg--bubble bg--bubble--5"></picture>
            <picture class="bg--bubble bg--bubble--6"></picture>
            <picture class="bg--bubble bg--bubble--7"></picture>
            <picture class="bg--bubble bg--bubble--8"></picture>
        </div>
    </section>

    <!-- Enfermedades -->
    <section class="enfermedades">
        <div class="container">
            <div class="content content-tipo-1">
                <div class="content__text">
                    <div class="content__header">
                        <h1 class="content__title title-ajuste"><span class="color--active">Enfermedades frecuentes en perros</span>.</h1>
                    </div>
                    <p class="content__paragraph">
                    Nuestros pequeños amigos también son propensos a diversas enfermedades y aunque afortunadamente muchas de estas pueden ser curables con un buen tratamiento, hay otras que no los son<span class="color--active">.</span> Es por
                            eso que la mejor manera de mantenerlos a salvo es evitando
                            cualquier posible enfermedad con anterioridad<span class="color--active">.</span>
                    </p>
                </div>
                <img src="../../imagenes/imgs-enfermedades.svg" alt="" class="content__img">
            </div>
            <div class="content content-tipo-2">
                <div class="content__text">
                    <p class="content__paragraph">
                        Una mala alimentación, la no vacunación, predisposición genética o simplemente la edad de nuestros compañeros, son factores que, en gran medida, son los responsables de que se presenten diversas enfermedades o algunas complicaciones en nuestros perros<span class="color--active">.</span>
                    </p>
                </div>
                <img src="../../imagenes/Group 12.png" alt="" class="content__img">
            </div>
            <div class="content content-tipo-1">
                <div class="content__text">
                    <div class="content__header">
                        <h1 class="content__title title-ajuste"><span class="color--active">Enfermedades frecuentes en gatos</span>.</h1>
                    </div>
                    <p class="content__paragraph">
                        Si ya has tenido o tienes un gato, sabrás que son mascotas muy independientes en comparación con los perros u otras mascotas<span class="color--active">.</span> Aun así, es necesario estar al pendiente de ellos y revisarlos cotidianamente para poder percatarnos si algo no anda bien con su salud<span class="color--active">.</span>
                    </p>
                </div>
                <img src="../../imagenes/imgs--enfermedades--2.svg" alt="" class="content__img">
            </div>
        </div>
    </section>
    <!-- Fin Enfermedades -->

    <!-- Servicios -->
    <section class="servicios" id="servicios">
        <div class="container">
            <h2 class="copy__title text-center"><span class="color--active">Nuestros servicios</span>.</h2>

            <div class="container__servicios">
                <h3 class="content__title">Descubre que <span class="color--active">veterinarios</span> están disponibles para <span class="color--active">atender</span> a tu mascota<span class="color--active">.</span></h3>
                <a href="ver_veterinarios.php" class="btn">Ver Veterinarios</a>
            </div>

            <div class="container__servicios">
                <div class="serch__contaner">
                    <h3 class="content__title">Encuentra algunas enfermedades que <span class="color--active">tus perros o gatos</span>  puedan contraer<span class="color--active">.</span></h3>
                    <div class="serch">
                        <input type="text" name="buscar" id="search" class="input--serch" placeholder="Buscar enfermedad . . ." required>
                    </div>
                    <div class="enfermedad__container" id="response">
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- Fin servicios -->

<!-- -------- Seccion Perros ---------- -->
    <section class="perros" id="dogs">
        <div class="container">
            <h1 class="content__title title-center">¿Como podemos definir <span class="color--active">"perro"?</span></h1>
            <div class="content content-tipo-1 content-tipo-3">
                <div class="perro__card card-tipo-1">
                    <p class="card__paragraph">
                    Un compañero leal y amoroso, que se preocupa más por ti que por sí mismo<span class="color--active">.</span>
                    </p>
                    <img src="../../imagenes/perro-card-2.png" class="img__card-top">
                </div>
                <div class=" perro__card card-tipo-1">
                    <p class="card__paragraph">
                    Mejor amigo, confidente, leal, consolador, compañero de juegos, indujente, energético, protector y digno de confianza<span class="color--active">.</span>
                    </p>
                    <img src="../../imagenes/perro-card-1.png" class="img__card-top">
                </div>
                <div class="perro__card card-tipo-2">
                    <p class="card__paragraph">
                        El perro es un mamífero doméstico que pertenece al grupo de los carnívoros<span class="color--active">.</span> Es una subespecie del lobo gris, a quien se lo considera como su antepasado, y tiene semejanzas con los zorros y los chacales<span class="color--active">.</span>
                    </p>
                </div>
            </div>
        </div>
    </section>
<!-- -------- Fin Seccion Perros ---------- -->

<!-- Section Dogs Paseo -->
    <section class="section paseo">
        <div class="container">
            <div class="section__header">
                <h1 class="content__title title-center"><span class="color--active">¿Dijiste un paseo?</span></h1>
                <h2 class="section__subtitle">Pasear a tu perro a diario tiene muchos beneficios para tu mascota<span class="color-active-dogs">.</span></h2>
            </div>
            <div class="section__content">
                <div class="paseo__beneficio">
                    <img src="../../imagenes/perro-saludable.png" class="paseo__img">
                    <p>Reduccion de problemas cardiacos.</p>
                </div>
                <div class="paseo__beneficio">
                    <img src="../../imagenes/perro-feliz.png" class="paseo__img">
                    <p>Previene la depresión.</p>
                </div>
                <div class="paseo__beneficio">
                    <img src="../../imagenes/articulacion.png" class="paseo__img">
                    <p>Previene problemas articulares.</p>
                </div>
                <div class="paseo__beneficio">
                    <img src="../../imagenes/cero-anciedad.png" class="paseo__img">
                    <p>Baja su nivel de ansiedad.</p>
                </div>
                <div class="paseo__beneficio">
                    <img src="../../imagenes/socializacion.png" class="paseo__img">
                    <p>Ayuda a mejorar la interacción social y estimulo mental.</p>
                </div>
                <div class="paseo__beneficio">
                    <img src="../../imagenes/perder-peso.png" class="paseo__img">
                    <p>Previene la obesidad.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Calor -->
    <section class="section calor">
        <div class="container container__calor">
            <div class="calor__circulo">
                <h1 class="section__title calor__title">Cuídanos del calor</h1>
            </div>
            <h1 class="content__title title-center calor__title--none">Cuídanos del calor</h1>
            <div class="calor__content">
                <div class="calor__elemento">
                    <p><img src="../../imagenes/sun-svgrepo-com.svg" class="img--sun"> Nunca dejes a tus mascotas dentro de un auto, aunque las ventanas estén abiertas<span class="color--active">.</span></p>
                </div>
                <div class="calor__elemento calor__elemento--2">
                    <p><img src="../../imagenes/sun-svgrepo-com.svg" class="img--sun"> Evite pasear a su perro entre las 10:00 am y 6:00 pm<span class="color--active">.</span></p>
                </div>
                <div class="calor__elemento">
                    <p><img src="../../imagenes/sun-svgrepo-com.svg" class="img--sun"> Mantenerlo hidratado con agua fresca<span class="color--active">.</span></p>
                </div>
                <div class="calor__elemento calor__elemento--2">
                    <p><img src="../../imagenes/sun-svgrepo-com.svg" class="img--sun"> Disminuir las cantidades de ejercicio<span class="color--active">.</span></p>
                </div>
                <div class="calor__elemento">
                    <p><img src="../../imagenes/sun-svgrepo-com.svg" class="img--sun"> Aseo y baños con frecuencia<span class="color--active">.</span></p>
                </div>
                <div class="calor__elemento calor__elemento--2">
                    <p><img src="../../imagenes/sun-svgrepo-com.svg" class="img--sun"> Tenerlo en un lugar fresco y protegido del sol<span class="color--active">.</span></p>
                </div>  
            </div>
        </div>
    </section>

    <!-- Maltrato Animal -->
    <section class="matrato-animal">
        <div class="container">
            <h1 class="content__title title-center"><span class="color--active">¡Denuncia el maltrato animal!</span></h1>
            <div class="content content-tipo-1">
                <div class="content__text">
                    <div class="content__header">
                        <h2 class="content__subtitle subtitle__underline"><span class="color--active">¿</span>Qué es el maltrato animal<span class="color--active">?</span></h2>
                    </div>
                    <p class="content__paragraph">El maltrato animal es un gran problema social, en el que un animal recibe un trato inadecuado e irracional por parte de alguna persona, ya sea dueña de dicho animal o no<span class="color--active">.</span> Este maltrato hacia los animales, genera estrés, sufrimiento, daño psicológico o en el peor de los casos, puede llevarlo a la muerte<span class="color--active">.</span></p>
                    <p class="content__paragraph">En el caso de animales domésticos, también se da este tipo de maltrato, aunque hay además diferentes factores a los anteriormente mencionados, pero que al final de cuentas, todos ponen en peligro al animal, por lo que es de suma importancia denunciar cualquier tipo de maltrato sobre cualquier animal<span class="color--active">.</span></p>
                </div>
                <img src="../../imagenes/perro--denuncia-1.png" alt="" class="content__img img-ajuste">
            </div>
            <div class="content content-tipo-2">
                <div class="content__text">
                    <div class="content__header">
                        <h2 class="content__subtitle subtitle__underline"><span class="color--active">¿</span>Qué puedo denunciar<span class="color--active">?</span></h2>
                    </div>
                    <p class="content__paragraph">Cada comunidad autónoma cuenta con una distinta legislación, pero en la gran mayoría, los actos que te mencionamos a continuación son acciones que generan una repercusión a nivel legal<span class="color--active">.</span></p>
                    <ul class="lista-denuncia">
                        <li class="lista-denuncia__elemento"><i class="fa-solid fa-paw color--active"></i>Violencia de cualquier índole<span class="color--active">.</span></li>
                        <li class="lista-denuncia__elemento"><i class="fa-solid fa-paw color--active" ></i>Abandono<span class="color--active">.</span></li>
                        <li class="lista-denuncia__elemento"><i class="fa-solid fa-paw color--active"></i>Malas condiciones de vida, como mantenerlo atado o en espacios reducidos<span class="color--active">.</span></li>
                        <li class="lista-denuncia__elemento"><i class="fa-solid fa-paw color--active" ></i>Privarlo de una buena alimentación<span class="color--active">.</span></li>
                        <li class="lista-denuncia__elemento"><i class="fa-solid fa-paw color--active" ></i>Hacinamiento<span class="color--active">.</span></li>
                        <li class="lista-denuncia__elemento"><i class="fa-solid fa-paw color--active" ></i>Asesinato<span class="color--active">.</span></li>
                    </ul>
                </div>
                <img src="../../imagenes/perro--denuncia-2.png" alt="" class="content__img img-ajuste">
            </div>
        </div>
    </section>
    <!-- Fin Maltrato Animal -->
   
    <!-- Section Curiosidades 1 -->
    <section class="section curiosidades">
        <div class="container container--curiosidades">
            <div class="section__header">
                <h1 class="content__title title-center"><span class="bg-circulo">¿Por</span><span class="color--active"> qué tu perro olfatea todo?</span></h1>
            </div>
            <div class="content--curiosidades">
                <div class="card--curiosidades">
                    <span class="numero--curiosidades">1</span>
                    <div class="text-curiosidades">
                        <p>EL sentido de olfato canino posee 300 millones de células receptoras, concediéndoles una memoria olfativa que distingue diversos olores<span class="color--active">.</span></p>
                    </div>
                </div>
                <div class="card--curiosidades">
                    <span class="numero--curiosidades">2</span>
                    <div class="text-curiosidades">
                        <p>Cada fosa nasal le permite oler objetos por separado y ubicarlos en su entorno<span class="color--active">.</span></p>
                    </div>
                </div>
                <div class="card--curiosidades">
                    <span class="numero--curiosidades">3</span>
                    <div class="text-curiosidades"><p>Su órgano vomeronasal detecta tus hormonas y las de otros animales para saber si son peligrosos<span class="color--active">.</span></p></div>
                </div>
                <div class="card--curiosidades">
                    <span class="numero--curiosidades">4</span>
                    <div class="text-curiosidades"><p>Si está entrenado, puede detectar enfermedades y localizar personas<span class="color--active">.</span></p></div>
                </div>
                <div class="card--curiosidades">
                    <span class="numero--curiosidades">5</span>
                    <div class="text-curiosidades"> <p>Saben dónde y con quién has estado y detectan tu olor antes de que llegues a casa<span class="color--active">.</span></p></div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Section vacunas -->
    <section class="section vacunas" >
        <div class="container">
            <h1 class="content__title title-center"><span class="color--active">Vacuna a tus mascotas</span></h1>
            <div class="vacunas__content">
                <div class="vacunas__card">
                    <h2 class="section__subtitle"><span class="color--active">¿</span>Por qué si a las vacunas<span class="color--active">?</span></h2>
                    <p class="paragraph paragraph__margin">Actualmente, con los avances médicos que se tienen en la actualidad, la vacunación es una herramienta fundamental si se quiere garantizar la salud de tus mascotas de una manera eficiente<span class="color--active">.</span> La vacunación, ayuda a prevenir una gran cantidad de enfermedades, por lo cual, debemos ser unos dueños responsables y vacunar lo antes posible a nuestros pequeños amigos<span class="color--active">.</span>
                        Con la vacunación, no solo estas protegiendo a tus mascotas, sino que estas protegiendo a toda la población canina y felina, debido a que se va aumentando el numero de inmunidad en la población y, por ende, la virulencia de estas enfermedades va disminuyendo<span class="color--active">.</span>  
                </div>
                <img src="../../imagenes/veterinarian-taking-care-of-pet-dog.jpg" class="vanunas__img--1">
            </div>
            <div class="vacunas__content vacunas__content--2">
                <div class="vacuna__etiqueta">
                    <h2 class="section__subtitle">Cartilla <span class="color--active">de vacunación</span></h2> 
                </div>
                <div class="vacunas__card vacunas__card--2">
                    <h2 class="section__subtitle"><span class="color--active">Importancia</span></h2>
                    <p>La cartilla de vacunación contiene información fundamentar sobre nuestros lomitos como los datos del propietario, su nombre, sexo, raza, tamaño, peso, color y edad y la información veterinaria que te permitirá llevar a cabo un seguimiento de sus necesidades de salud<span class="color--active">.</span> Es importante que sepas que el calendario de vacunación de un cachorro inicia entre las 6 y 8 semanas<span class="color--active">.</span>   Posteriormente, las mascotas deben ser revacunadas anualmente, siguiendo las especificaciones del Médico Veterinario y que, el esquema de vacunación y desparasitaciones puede variar de acuerdo con muchos factores, como la especie, el estado de salud de tu lomito, el país, la región, el clima o si hay algún tipo de brote con mayor incidencia, por lo que deberás estar muy pendiente de las indicaciones que te dé tu veterinario de confianza cada que acudan a consulta<span class="color--active">.</span>  
                </div>
            </div>
            <div class="vacunas__content vacunas__content--3">
                <div class="vacunas__card vacunas__card--3">
                    <ul>
                        <li class="vacunas__lista paragraph"><span class="color--active">Moquillo: </span>se contagia por secreciones respiratoria<span class="color--active">.</span></li>
                        <li class="vacunas__lista paragraph"><span class="color--active">Parvovirus: </span>se transmite por medio de caca contaminada<span class="color--active">.</span></li>
                        <li class="vacunas__lista paragraph"><span class="color--active">Parainfluenza: </span>pasa de un perro a otro por secreciones nasales<span class="color--active">.</span></li>
                        <li class="vacunas__lista paragraph"><span class="color--active">Rabia: </span>se transmite a través de una mordida con saliva infectada<span class="color--active">.</span></li>
                        <li class="vacunas__lista paragraph"><span class="color--active">Leptospirosis: </span>se contagia por medio de la orina<span class="color--active">.</span></li>
                        <li class="vacunas__lista paragraph"><span class="color--active">Bordetella: </span>se contagia a través de tos y estornudos<span class="color--active">.</span></li>
                        <li class="vacunas__lista paragraph"><span class="color--active">Hepatitis canina: </span>cualquier contacto con un enfermo es peligroso<span class="color--active">.</span></li>
                    </ul>
                      
                </div>
                <div class="vacuna__etiqueta vacuna__etiqueta--2">
                    <h2 class="section__subtitle"><span class="color--active">Vacunas básicas para tu perro</span>.</h2>
                </div>
            </div>

            <div class="vacunas__content vacunas__content--3 vacunas__content--4 vacunas__content--42">
                <div class="vacunas__card vacunas__card--3 ">
                    <ul>
                        <li class="vacunas__lista paragraph"><span class="color--active">Rabia: </span>aplicar esta vacuna es un requisito legal en algunos países debido a que es mortal y puede transmitirse a humanos con una mordedura (principalmente)<span class="color--active">.</span></li>
                        <li class="vacunas__lista paragraph"><span class="color--active">Trivalente: </span>es provocada por el virus del herpes felino común. Los síntomas incluyen estornudos, secreción nasal y babeo<span class="color--active">.</span> Los ojos de tu gato pueden tener costras mucosas, que provocarán mucho más y comer mucho menos de lo normal<span class="color--active">.</span></li>
                        <li class="vacunas__lista paragraph"><span class="color--active">Calicivirus : </span>tiene síntomas similares que afectan el sistema respiratorio y también causan úlceras en la boca<span class="color--active">.</span> Puede provocar neumonía si no se trata: los gatitos y los gatos mayores son especialmente vulnerables<span class="color--active">.</span></li>
                        <li class="vacunas__lista paragraph"><span class="color--active">moquillo : </span>se transmite fácilmente de un gato a otro<span class="color--active">.</span> El moquillo es tan común que casi todos los gatos, independientemente de su raza o condiciones de vida, estarán expuestos a él durante su vida<span class="color--active">.</span> Es especialmente común en los gatitos que aún no han sido vacunados contra moquillo, y los síntomas incluyen fiebre, vómitos y diarrea con sangre<span class="color--active">.</span></li>
                    </ul>
                      
                </div>
                <div class="vacuna__etiqueta vacuna__etiqueta--2">
                    <h2 class="section__subtitle"><span class="color--active">Vacunas básicas para tu gato</span>.</h2>
                </div>
            </div>
            <div class="vacunas__content vc--bg">
                <div class="vacunas__wrap">
                    <div class="vacunas__wrap--text">
                        <h2 class="section__subtitle title-center"><span class="color--active">Plan Vacunal para perros y gatos</span>.</h2>
                        <p class="vacunas__wrap--paragraph">Es importante que conozcas el calendario de vacunación de tu mascota, porque en el vienen las vacunas junto con su tiempo de aplicación<span class="color--active">.</span></p>
                        <p class="vacunas__wrap--paragraph">El siguiente calendario vacunal es el de un laboratorio llamado Nobivac<span class="color--active">.</span> Este calendario es muy utilizado por los veterinarios, pero cabe recalcar que este es solo uno de los tantos calendarios vacunales que hay<span class="color--active">.</span></p>
                    </div>
                    <picture class="imagen__plan--caunal">
                        <img src="../../imagenes/Plan_vacunal.webp" alt="" class="img_plan--vacunal">
                    </picture>
                </div>
            </div>
        </div>
    </section>

    <!-- Seccion Gatos -->
    <section class="gatos" id="gatos">
        <div class="container">
            <h1 class="content__title title-center"><span class="color--active">Gatos</span></h1>
            <div class="content content-tipo-1">
                <div class="content__text">
                    <div class="content__header">
                        <h2 class="content__subtitle"><span class="color--active">¡</span> Se un dueño responsable <span class="color--active">!</span></h2>
                    </div>
                    <p class="content__paragraph">Si ya tienes o deseas tener un gato como mascota, debes ser responsable de su salud y bienestar<span class="color--active">.</span> Debes dedicar mucho tiempo en él, cuidándolo y dándole cariño<span class="color--active">.</span> Es muy importante que vacunes y desparasites a tu gato, además de que este monitoreado por su medico veterinario<span class="color--active">.</span></p>
                    <p class="content__paragraph">Los cuidados de un gato son ciertamente más complejos que los de un perro y esto se debe a distintas razones<span class="color--active">.</span>
                        La razón más importante es su anatomía y su fisiología<span class="color--active">.</span> Un ejemplo claro de esto, es que, los gatos tienen una mayor susceptibilidad que los perros a tener problemas renales y esto se debe a la composición de los riñones<span class="color--active">. </span>Los riñones están formados por unidades funcionales llamadas “nefronas”<span class="color--active">.</span>
                        Los gatos tienen alrededor de 200.000 nefronas, mientras que los perros cuentan con 400.000, es decir, el doble<span class="color--active">.</span></p>
                    <p class="content__paragraph">Por esta razón, debes de seguir con las recomendaciones que te mencionaremos aquí, si deseas ser un mejor dueño<span class="color--active">.</span></p>
                </div>
                <img src="../../imagenes/seccion-gatos.png" alt="" class="content__img img-ajuste">
            </div>
        </div>
    </section>
    <!-- Fin Seccion Gatos -->

    <!-- -------- Seccion Alimentacion ---------- -->
    <section class="alimentacion">
        <div class="container">
            <h1 class="content__title title-center"><span class="color--active">Alimentación</span></h1>
            <div class="content content-tipo-1 content-tipo-3">
                <div class="comida--gatos__card">
                    <h2 class="content__subtitle subtitle-alimentacion"><span class="color--active">¿</span>Cómo alimentar a mi gato<span class="color--active">?</span></h2>
                    <p class="content__paragraph">Es importante tener en cuenta la alimentación de nuestras mascotas<span class="color--active">.</span> En el caso de los gatos es necesario una dieta especializada para felinos, normalmente el alimento económico contiene algunos elementos que aceleran el daño renal y por eso es importante tener en cuenta la marca del alimento, lo recomendable es que sea alimento Premium debido a que el alimento Premium viene más balanceado que el alimento económico<span class="color--active">.</span></p>
                </div>
                <img src="../../imagenes/comida--gato.png" class="img--comida--gato">
                <div class="comida--gatos__card">
                    <h2 class="content__subtitle subtitle-alimentacion"><span class="color--active">¿</span>Comida casera<span class="color--active">?</span></h2>
                    <p class="content__paragraph">No es recomendable ofrecerles o facilitarles comida de casa a los gatos por su alto contenido de sales, grasas y condimentos<span class="color--active">.</span> Es recomendable llevar a nuestra mascota al médico veterinario 2 veces al año para que haga una evaluación general y nos recomiende un plan de alimentación para nuestra mascota, de esta manera nuestra mascota no caerá en sobrealimentación y al mismo tiempo en sobrepeso (o viceversa)<span class="color--active">.</span></p>
                </div>
            </div>
        </div>
    </section>

    <!-- ambiente -->
    <section class="ambiente">
        <div class="container content-tipo-1">
            <h1 class="content__title"><span class="color--active">Enriquecimiento ambiental</span></h1>
            <div class="content__text border-left">
                <p class="content__paragraph">
                    Consiste en la mejora del habitad en dónde estará establecido nuestra mascota, es importante que los gatos tengan un espacio destinado para ellos<span class="color--active">.</span> El habitad tendrá que adquirir áreas destinadas para: descanso, alimentación, recreo, ejercicio y área de eliminación de residuos (heces y orina)<span class="color--active">.</span> Es conveniente que la casa o el habitad que frecuentará el gato, tenga ventanales grandes, a los gatos les gusta mucho descansar en las ventanas y observar el panorama<span class="color--active">.</span>
                </p>
            </div>
        </div>
    </section>
    <!-- Fin Ambiente -->

    <!-- Section Chequeo -->
    <section class="section chequeo">
        <div class="container">
            <div class="chequeo__content">
                <div class="imagen--chequeo">
                    <div class="chequeo__card">
                        <h2 class="section__subtitle">¡<span class="color--active">Chequeo rutinario</span>!</h2>
                        <p class="paragraph paragraph__margin">Como se mencionó en el apartado de “alimentación” es importante llevar a nuestras mascotas “aparentemente sanas” a chequeos de rutina con su médico veterinario de confianza por lo menos 2 veces al año para revisar que todo esté bien, de esta forma podremos percatarnos si existe alguna enfermedad crónica en desarrollo y así poder hacerle frente de forma anticipada<span class="color--active">.</span></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="referencia">
        <div class="container__referencias">
            <h3>Referencia<span class="color--active">.</span></h3>
            <h4>Toda la información incluida en esta pagina esta abalada por el médico veterinario:</h4>
            <p>José Reyes Romero Giménez.</p>
            <p>Cedula profesional: #1771633.</p>
        </div>
    </section>
    <footer class="footer">
        <div class="footer__container">
            <div class="row">
                <div class="footer-col">
                    <h4>Healthy Pets</h4>
                    <nav>
                        <ul>
                            <li><a href="#servicios">Nuestros servicios</a></li>
                            <li><a href="#">Sobre mi mascota</a></li>
                            <li><a href="../../html/contacto.html">Contacto</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="footer-col">
                    <h4>Algo mas</h4>
                    <nav>
                        <ul>
                            <li><a href="#">Sobre nosotros</a></li>
                            <li><a href="#">Politica y privacidad</a></li>
                            <li><a href="#">Articulos y productos</a></li>
                            <li><a href="#">Acerca de</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="footer-col">
                    <h4>Siguenos en</h4>
                        <div class="social-links">
                            <a href="#"><i class="fab"></i></a>
                            <a href="#"><i class="fab"></i></a>
                            <a href="#"><i class="fab"></i></a>
                        </div>
                </div>
            </div>
        </div>
        <hr>
        <h3>Healthy Pets &copy; 2023</h3>
    </footer>

    <script src="../../js/nav_responsive.js"></script>
    <script src="../../js/buscar.js"></script>
    <script src="https://kit.fontawesome.com/a34b92f4e5.js" crossorigin="anonymous"></script>
</body>
</html>