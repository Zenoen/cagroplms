




        // Initialize a global object to hold references to table rows
        const checkboxReferences = {};

        // Initialize the total at a higher scope
        let total = 0;
        const result = [];
        // Event handler for row clicks
        function onRowClick(event) {
            // Ensure the event and the clicked row are valid
            if (!event || !event.currentTarget) return;

            const row = event.currentTarget; // The clicked row
            const itemId = row.querySelectorAll('td')[0].textContent.trim(); // Extract itemId from the first cell
            const cb = document.getElementById("check" + itemId); // Corresponding checkbox
            const totalSelectedItem = document.getElementById("totalSelectedItem"); // Total display element
            const table = document.getElementById("selectedItemTable");
            const tableList = document.getElementById("tableList"); // Reference to the table

            const tableTotal = document.getElementById("tableTotal"); // Reference to the table


            if (!table || !cb || !totalSelectedItem) return;
            const itemBrand = row.querySelectorAll('td')[3].textContent; // Extract item brand
            const itemName = row.querySelectorAll('td')[4].textContent; // Extract item name
            const itemQuant = parseInt(row.querySelectorAll('td')[5].textContent); // Extract item name

            const itemPrice = parseFloat(row.querySelectorAll('td')[6].textContent.replace("₱", "")); // Extract item price
            let newRow;

            if (cb.checked) {
                // If the checkbox is checked, uncheck it and remove the associated row
                cb.checked = false;
                total -= itemPrice; // Decrease total

                const rowToRemove = checkboxReferences[itemId]; // Get the row reference
                if (rowToRemove) {
                    const rowIndex = Array.from(table.rows).indexOf(rowToRemove); // Find row index
                    table.deleteRow(rowIndex); // Delete the row

                    // Remove from references
                    delete checkboxReferences[itemId];
                }

            } else {

                cb.checked = true;
                total += itemPrice; // Increase total

                newRow = table.insertRow(); // Insert a new row
                newRow.classList.add('border-bottom');

                // Insert cells into the new row
                const cell0 = newRow.insertCell(0);

                const cell1 = newRow.insertCell(1);

                const cell3 = newRow.insertCell(2);
                const cell2 = newRow.insertCell(3);
                // const cell4 = newRow.insertCell(3);
                // cell3.classList.add()
                cell3.classList.add('d-flex', 'justify-content-center', 'p-3')
                cell2.classList.add('p-3')




                // Set content for the cells
                cell0.innerText = itemId;
                cell0.classList.add('collapse');
                cell1.innerHTML = '<p class="" style="margin-bottom:-8px">' + itemName + '</p> <small class="text-secondary">' + itemBrand + '</small>';
                cell2.innerText = "₱ " + itemPrice.toFixed(2); // Display item price with 2 decimal places
                // Display item price with 2 decimal places
                cell3.innerHTML = '<div class="border rounded small p-0">' +
                    '<button type="button" class="btn bg-light p-0 ps-2 pe-2 decrease-btn">-</button>' +
                    '<span  class="quantity ms-3 me-3 text-center bg-white border-0 p-0" id="item' + itemId + '"  >1</span>' +
                    '<button type="button" class="btn bg-light p-0 ps-2 pe-2 increase-btn">+</button>' +
                    '</div>';

                const decreaseButton = cell3.querySelector(".decrease-btn");
                const increaseButton = cell3.querySelector(".increase-btn");
                const quantityInput = cell3.querySelector(".quantity");

                // Event listener for the increase button
                increaseButton.addEventListener("click", function () {
                    let currentQuantity = parseInt(quantityInput.innerText); // Read the current quantity
                    if (currentQuantity < itemQuant) {
                        currentQuantity++; // Increase by 1
                        cell2.innerText = "₱ " + (itemPrice * currentQuantity).toFixed(2);
                        quantityInput.innerText = currentQuantity; // Update the text
                        sumColumn();
                    }
                });

                // Event listener for the decrease button
                decreaseButton.addEventListener("click", function () {
                    let currentQuantity = parseInt(quantityInput.innerText); // Read the current quantity
                    if (currentQuantity > 1) { // Ensure the quantity does not go below 1
                        currentQuantity--; // Decrease by 1
                        cell2.innerText = "₱ " + (itemPrice * currentQuantity).toFixed(2);
                        quantityInput.innerText = currentQuantity; // Update the text
                        sumColumn();
                    }
                });

                // Event listener for manual input changes
                // quantityInput.addEventListener("input", function () {
                //     let currentQuantity = parseInt(quantityInput.innerText); // Read the current quantity
                //     if (currentQuantity < itemQuant) {

                //         if (isNaN(currentQuantity) || currentQuantity < 1) {
                //             // Ensure the input is a valid number and not below 1
                //             currentQuantity = 0;
                //         }

                //         cell2.innerText = "₱" + (itemPrice * currentQuantity).toFixed(2);

                //         quantityInput.innerText = currentQuantity; // Update the input to a valid value
                //         sumColumn();
                //     }
                // });
                // Add the row to the references
                checkboxReferences[itemId] = newRow;
            }

            sumColumn();


        }

        function allId() {
            const table = document.getElementById("selectedItemTable");

            const tbody = table.getElementsByTagName("tbody")[0];

            // Get all rows in the tbody
            const rows = tbody.getElementsByTagName("tr");

            const result = new Set(); // Using a Set to avoid duplicates

            for (let i = 0; i < rows.length; i++) {
                // Get the ID from the first column
                const idCell = rows[i].getElementsByTagName("td")[0];
                const id = idCell.textContent.trim();

                // Construct the ID of the input field
                const inputId = "item" + id;

                const quant = document.getElementById(inputId);
                if (quant) {
                    const entry = `[${id},${quant.innerText}]`;

                    result.add(entry);

                    console.log("ID: " + id);
                    console.log("Quantity: " + quant.innerText);
                } else {
                    console.warn(`Input field with ID ${inputId} not found.`);
                }
            }

            // Convert Set to array and join with commas
            const resultArray = Array.from(result);
            console.log(resultArray.join(','));
            const dataString = resultArray.join(',');

            // Construct the URL with the data parameter
            const url = `purchase.php?data=[${encodeURIComponent(dataString)}]`;

            // Redirect to the purchase.php page
            window.location.href = url;
        }

        function sumColumn() {
            // Get the table
            const table = document.getElementById("selectedItemTable");

            const tbody = table.getElementsByTagName("tbody")[0];

            // Get all rows in the tbody
            const rows = tbody.getElementsByTagName("tr");

            // Initialize sum
            let sum = 0;

            // Iterate over the rows
            for (let i = 0; i < rows.length; i++) {
                // Get the cell from the third column (index 2)
                const priceCell = rows[i].getElementsByTagName("td")[3];

                // Remove non-numeric characters and convert to a floating-point number
                const cleanText = priceCell.textContent.replace(/[^\d.-]/g, ''); // Remove currency symbol, etc.
                const value = parseFloat(cleanText);

                if (!isNaN(value)) {
                    sum += value;
                }
            }

            // Display the sum in console
            totalSelectedItem.textContent = sum.toFixed(2);
            console.log("Total Sum: ₱" + sum.toFixed(2));
        }

        document.addEventListener('DOMContentLoaded', () => {
            const tableRows = document.querySelectorAll('table tr'); // Select all rows in the table body
            tableRows.forEach(row => {
                row.addEventListener('click', onRowClick); // Attach the click event listener
            });
        });

        function onDiseaseSearch() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchBox");
            filter = input.value.toUpperCase();
            table = document.getElementById("table");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[4];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
        const viewBtns = document.querySelectorAll('#delete-btn');
        viewBtns.forEach(btn => {
            btn.addEventListener('click', () => {

                const row = btn.parentNode.parentNode;

                const id = row.querySelector('td:first-child').textContent;

                // alert(id);
                $("#deleteModal").modal("show");
                document.getElementById("deleteID").value = id;

            });
        });

        const editBtns = document.querySelectorAll('#editBtn');
        editBtns.forEach(btn => {
            btn.addEventListener('click', () => {

                const row = btn.parentNode.parentNode;
                const itemId = row.querySelectorAll('td')[0].textContent.trim(); // Extract itemId from the first cell
                const cb = document.getElementById("check" + itemId); // Corresponding checkbox

                const id = row.querySelector('td:first-child').innerText;
                const brand = row.querySelector('td:nth-child(4)').innerText;
                const name = row.querySelector('td:nth-child(5)').innerText;
                const quantity = row.querySelector('td:nth-child(6)').innerText;
                const price = row.querySelector('td:nth-child(7)').innerText.replace("₱ ", "");

                if (cb.checked) {
                    cb.checked = false;
                } else {
                    cb.checked = true;

                }
                // alert(id);

                document.getElementById("editID").value = id;
                document.getElementById("editBrand").value = brand;
                document.getElementById("editName").value = name;
                document.getElementById("editQuantity").value = quantity;
                document.getElementById("editPrice").value = price;

                $("#editModal").modal("show");

            });
        });
   