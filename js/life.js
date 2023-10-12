function addActivity() {
    const name = document.getElementById('activityName').value;
    const date = document.getElementById('activityDate').value;
    const time = document.getElementById('activityTime').value;
    const location = document.getElementById('activityLocation').value;
    const ootd = document.getElementById('ootd').value;

    const entryDiv = document.createElement('div');
    entryDiv.classList.add('diary-entry');

    const titleElement = document.createElement('h2');
    titleElement.textContent = name;

    const dateElement = document.createElement('p');
    dateElement.classList.add('time');
    dateElement.textContent = `Date: ${date} | Time: ${time}`;

    const locationElement = document.createElement('p');
    locationElement.textContent = `Location: ${location}`;

    const ootdElement = document.createElement('p');
    ootdElement.textContent = `Outfit of the Day: ${ootd}`;

    entryDiv.appendChild(titleElement);
    entryDiv.appendChild(dateElement);
    entryDiv.appendChild(locationElement);
    entryDiv.appendChild(ootdElement);

    document.getElementById('activityEntries').appendChild(entryDiv);

    // Clear form fields
    document.getElementById('activityName').value = '';
    document.getElementById('activityDate').value = '';
    document.getElementById('activityTime').value = '';
    document.getElementById('activityLocation').value = '';
    document.getElementById('ootd').value = '';
}
