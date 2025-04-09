<?php
    $event = [
        "title" => "Título Evento 1",
        "image" => "https://www.cetys.mx/educon/wp-content/uploads/2021/09/Conference.jpg",
        "date" => "29/05/2025",
        "description" => "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?",
        "ubicacion" => "Ciudad de México, México",
        "encargado" => "Eligio Elizarraraz Molina",
    ];

    $date = DateTime::createFromFormat("d/m/Y", $event["date"])->format("l/d/F/M/Y");   // Output Example -> Monday/29/September/Sep/2025
    $dateArray = explode("/", $date);
?>

<style>
    @import url("/build/styles/event.css");
</style>

<section class="event">
    <div class="event__container">
        <img class="event__image" src="<?php echo $event["image"]; ?>" alt="Imagen Evento" />
        <div class="event__info">
            <h2 class="event__title"><?php echo $event["title"]; ?></h2>
            <div class="event__subtitle">
                <div class="event__info-box">
                    <p class="event__info-box_month"><?php echo strtoupper($dateArray[3]); ?></p>
                    <p class="event__info-box_day"><?php echo $dateArray[1]; ?></p>
                </div>
                <div class="event__subtitle-info">
                    <p class="event__text event__text-bold"><?php echo $dateArray[0] . " " . $dateArray[1] . ", " . $dateArray[2] . " " . $dateArray[4]; ?></p>
                    <p class="event__text">10:00 - 12:30</p>
                </div>
            </div>
            <div class="event__subtitle">
                <div class="event__info-box">
                    <i class='bx bx-map event__info-box_location'></i>
                </div>
                <div class="event__subtitle-info">
                    <p class="event__text event__text-bold">Ubicación</p>
                    <p class="event__text"><?php echo $event["ubicacion"]; ?></p>
                </div>
            </div>
            <div class="event__subtitle">
                <button class="event__subscribe">Inscríbete</button>
            </div>
        </div>
        <div class="event__content">
            <h3 class="event__text event__text-bold">Encargado del evento</h3>
            <hr />
            <div class="event__contributor">
                <i class='bx bxs-user-circle event__contributor-icon'></i>
                <span class="event__text"><?php echo $event["encargado"]; ?></span>
            </div>
        </div>
        <div class="event__main">
            <div class="event__content">
                <h3 class="event__text event__text-bold">Acerca del evento</h3>
                <hr />
                <p class="event__text"><?php echo $event["description"]; ?></p>
            </div>
            <div class="event__content">
                <h3 class="event__text event__text-bold">Ubicación</h3>
                <hr />
                <p class="event__text"><?php echo "Aquí va la ubicación" ?></p>
            </div>
        </div>
    </div>
</section>