/*
    PROBLEMY NA VYRIESENIE ALE UZ NEVLADZEM LEBO JE JEDNA HODINA V NOCI:
        - checkboxy sa odklikavaju ked sa dvakrat klikne na apply filters - ked nie je riadok 26-27, tak sa to nerobi

       - pridat text - vsetky knihy alebo to co user zadal
*/

//otvaranie sidebaru na malych rozliseniach
document.getElementById('sidebar-open').onclick = (e)=>{
    document.getElementById('sidebar-filter').classList.toggle('show')
}

//ulozenie zakliknuteho stavu checkboxu do local storage, aby zostali zakliknute po aplikovani filtrov
const checkboxes = document.querySelectorAll('input[type="checkbox"]');
for (let i = 0; i < checkboxes.length; i++) {
  const value = localStorage.getItem(checkboxes[i].id);
  if (value === 'true') {
    checkboxes[i].checked = true;
  }
}
for (let i = 0; i < checkboxes.length; i++) {
  checkboxes[i].addEventListener('click', function() {
    localStorage.setItem(checkboxes[i].id, checkboxes[i].checked);
  });
}

if (window.location.search == "") {
    localStorage.clear();
}

//aplikovanie filtrov
document.getElementById('apply-btn').addEventListener('click', function() {
    document.getElementById('apply-btn').addEventListener('click', function() {
        const checkboxes_type = document.querySelectorAll('input[name="type[]"]:checked');
        const values_type = [];
        for (let i = 0; i < checkboxes_type.length; i++) {
          values_type.push(checkboxes_type[i].value);
        }
    
        const checkboxes_genre = document.querySelectorAll('input[name="genre[]"]:checked');
        const values_genre = [];
        for (let i = 0; i < checkboxes_genre.length; i++) {
          values_genre.push(checkboxes_genre[i].value);
        }
    
        const checkboxes_lang = document.querySelectorAll('input[name="lang[]"]:checked');
        const values_lang = [];
        for (let i = 0; i < checkboxes_lang.length; i++) {
          values_lang.push(checkboxes_lang[i].value);
        }
    
        const checkboxes_pages = document.querySelectorAll('input[name="pages[]"]:checked');
        const values_pages = [];
        for (let i = 0; i < checkboxes_pages.length; i++) {
          values_pages.push(checkboxes_pages[i].value);
        }
    
        const url = new URL(window.location.href);

        if (values_type.length > 0) url.searchParams.set('type', values_type.join(','));
        else url.searchParams.delete('type');

        if (values_genre.length > 0) url.searchParams.set('genre', values_genre.join(','));
        else url.searchParams.delete('genre');
        
        if (values_lang.length > 0)  url.searchParams.set('lang', values_lang.join(','));
        else url.searchParams.delete('lang');
        
        if (values_pages.length > 0) url.searchParams.set('pages', values_pages.join(','));
        else url.searchParams.delete('pages');

        url.searchParams.set('page', 1);
        window.location.href = url.href;
    });
});

//odstranenie filtrov
document.getElementById('cancel-btn').addEventListener('click', function() { 
    const url = new URL(window.location.href);
    const params = new URLSearchParams(url.search);
    
    params.delete('type');
    params.delete('genre');
    params.delete('lang');
    params.delete('pages');
    params.set('page', 1);
    
    url.search = params.toString();
    window.location.href = url.href;

    localStorage.clear();
});