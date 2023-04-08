@props(['activated'])

<nav class="row">
    <ul id="progressbar">
        <li @if ($activated > 0)
                class="active"
            @endif
            >Košík</li>
        <li @if ($activated > 1)
                class="active"
            @endif
            >Doprava</li>
        <li
            @if ($activated > 2)
                class="active"
            @endif
        >Platba</li>
    </ul>
</nav>