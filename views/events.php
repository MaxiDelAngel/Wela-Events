<style>
    @import url("/build/styles/events.css");
</style>

<section class="events">
    <div class="events__container">
        <h1 class="events__title">Busca tus eventos</h1>

        <div class="events__search-bar">
            <form class="events__form" action="/search" role="search">
                <div class="events__input-container">
                    <i class='bx bx-map-pin'></i>
                    <select class="events__input">
                        <option value="0" selected>Todo México</option>
                        <option value="1">Aguascalientes</option>
                        <option value="2">Tamaulipas</option>
                    </select>
                </div>
                <div class="events__input-container">
                    <input class="events__input" type="date" />
                </div>
                <div class="events__input-container">
                    <i class='bx bx-search'></i>
                    <input class="events__input" type="search" />
                    <button class="events__button" type="submit">Buscar</button>
                </div>
            </form>
        </div>

        <div class="events__cards">
            <?php
                $events = array(
                    0 => [
                        "title" => "Título Evento 1",
                        "image" => "https://www.cetys.mx/educon/wp-content/uploads/2021/09/Conference.jpg",
                        "date" => "29/05/2025",
                        "description" => "descripción"
                    ],
                    1 => [
                        "title" => "Título Evento 2",
                        "image" => "https://www.esneca.com/wp-content/uploads/eventos-sociales.jpg",
                        "date" => "24/05/2025",
                        "description" => "descripción"
                    ],
                    2 => [
                        "title" => "Título Evento 3",
                        "image" => "https://www.marquid.com/wp-content/uploads/2017/06/6197706_orig.jpg",
                        "date" => "31/05/2025",
                        "description" => "descripción"
                    ],
                    3 => [
                        "title" => "Título Evento 4",
                        "image" => "https://elolivar.es/olivar-content/uploads/2022/10/agencia-de-eventos.png",
                        "date" => "03/06/2025",
                        "description" => "descripción"
                    ]
                );

                foreach ($events as $event)
                {
                    echo '
                        <div class="events__card">
                            <img class="events__card-image" src="'.$event["image"].'" alt="Imagen Evento">
                            <div class="events__card-info">
                                <span class="events__card-date">'.$event["date"].'</span>
                                <h6 class="events__card-title">'.$event["title"].'</h6>
                            </div>
                        </div>
                    ';
                }
            ?>
            <div class="events__card">
                <img class="events__card-image" src="https://www.marquid.com/wp-content/uploads/2017/06/6197706_orig.jpg" alt="Imagen Evento">
                <div class="events__card-info">
                    <span class="events__card-date">Fecha</span>
                    <h6 class="events__card-title">Título Título Título Título  Título Título Título Título Título Título</h6>
                </div>
            </div>
        </div>
    </div>
</section>