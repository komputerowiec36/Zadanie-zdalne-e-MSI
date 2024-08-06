window.onload = pageLoaded;
 
function pageLoaded() {
  const input_colors_picker = document.querySelectorAll('input[type="color"]');
 
  input_colors_picker.forEach((input_color) => {
    input_color.addEventListener('input', setRowBackgroundColor);
  });
 
  input_colors_picker[0].dispatchEvent(new Event('input', null));

  input_colors_picker[1].dispatchEvent(new Event('input', null));
}
 
function setRowBackgroundColor(e) {
  const type_row = (e.target.id === 'color_even') ? 'even' : 'odd';
  const tr_rows = document.querySelectorAll(`tbody tr:nth-child(${type_row})`);
  tr_rows.forEach((tr_row) => {
    tr_row.style.backgroundColor = e.target.value;
  });  
}

 