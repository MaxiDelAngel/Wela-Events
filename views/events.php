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
            Contenido de eventos
        </div>
    </div>
</section>