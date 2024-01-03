
  function downloadTable() {
    // Get table
    var table = document.querySelector('table');
  
    // Get table headers
    var headers = [];
    var headerElements = table.querySelectorAll('thead th');
    for (var i = 0; i < headerElements.length; i++) {
      headers.push(headerElements[i].textContent);
    }
  
    // Get table rows
    var rows = [];
    var rowElements = table.querySelectorAll('tbody tr');
    for (var i = 0; i < rowElements.length; i++) {
      var cells = rowElements[i].querySelectorAll('td');
      var rowData = [];
      for (var j = 0; j < cells.length; j++) {
        rowData.push(cells[j].textContent);
      }
      rows.push(rowData);
    }
  
    // Create CSV content
    var csvContent = "data:text/csv;charset=utf-8,";
    csvContent += headers.join(',') + '\n';
    for (var i = 0; i < rows.length; i++) {
      csvContent += rows[i].join(',') + '\n';
    }
  
    // Create download link and click it
    var encodedUri = encodeURI(csvContent);
    var link = document.createElement("a");
    link.setAttribute("href", encodedUri);
    link.setAttribute("download", "reservation_records.csv");
    document.body.appendChild(link);
    link.click();
  }
s  

  