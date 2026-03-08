// Mock Data for Admin Dashboard

const recentQuotes = [
    {
        id: 1,
        name: "John's Supermarket",
        service: "Installation",
        date: "2026-03-08",
        status: "New"
    },
    {
        id: 2,
        name: "Metro Hotel",
        service: "Maintenance",
        date: "2026-03-07",
        status: "Pending"
    },
    {
        id: 3,
        name: "East London Cold Storage",
        service: "Repair / Emergency",
        date: "2026-03-06",
        status: "Resolved"
    },
    {
        id: 4,
        name: "Sunrise Cafe",
        service: "Installation",
        date: "2026-03-05",
        status: "Resolved"
    }
];

const mockNotifications = [
    {
        id: 1,
        title: "New Quote Request",
        message: "John's Supermarket requested an Installation quote.",
        time: "10 mins ago",
        icon: "fa-file-invoice"
    },
    {
        id: 2,
        title: "Emergency Repair",
        message: "Urgent repair needed at Metro Hotel.",
        time: "2 hours ago",
        icon: "fa-exclamation-circle"
    },
    {
        id: 3,
        title: "System Update",
        message: "Your dashboard was updated successfully.",
        time: "1 day ago",
        icon: "fa-info-circle"
    }
];

// Initialize UI
document.addEventListener("DOMContentLoaded", () => {
    loadQuotes();
    loadNotifications();

    // Mobile Menu Toggle
    const mobileBtn = document.getElementById("mobile-menu-btn");
    const sidebar = document.getElementById("sidebar");

    if (mobileBtn && sidebar) {
        mobileBtn.addEventListener("click", () => {
            if (sidebar.style.transform === "translateX(0px)") {
                sidebar.style.transform = "translateX(-100%)";
            } else {
                sidebar.style.transform = "translateX(0px)";
                sidebar.style.zIndex = "1001";
            }
        });
    }
});

// Load Quotes Table
function loadQuotes() {
    const tableBody = document.querySelector("#quotes-table tbody");
    if (!tableBody) return;

    tableBody.innerHTML = "";

    recentQuotes.forEach(quote => {
        let statusClass = "status-pending"; // default
        if (quote.status === "New") statusClass = "status-new";
        if (quote.status === "Resolved") statusClass = "status-resolved";

        const row = document.createElement("tr");

        row.innerHTML = `
            <td style="font-weight: 500;">${quote.name}</td>
            <td>${quote.service}</td>
            <td>${quote.date}</td>
            <td><span class="status-badge ${statusClass}">${quote.status}</span></td>
            <td>
                <button title="View Details" style="background: none; border: none; font-size: 1.1rem; color: var(--primary-blue); cursor: pointer; margin-right: 10px;">
                    <i class="fas fa-eye"></i>
                </button>
                <button title="Delete" style="background: none; border: none; font-size: 1.1rem; color: #dc3545; cursor: pointer;">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </td>
        `;

        tableBody.appendChild(row);
    });
}

// Load Notifications List
function loadNotifications() {
    const notifList = document.getElementById("notification-list");
    if (!notifList) return;

    notifList.innerHTML = "";

    if (mockNotifications.length === 0) {
        notifList.innerHTML = `<li style="text-align: center; color: var(--text-gray); padding: 20px;">No new notifications</li>`;
        return;
    }

    mockNotifications.forEach(notif => {
        const li = document.createElement("li");
        li.className = "notification-item";

        li.innerHTML = `
            <div class="notif-icon"><i class="fas ${notif.icon}"></i></div>
            <div class="notif-content">
                <h4>${notif.title}</h4>
                <p>${notif.message}</p>
                <span class="notif-time">${notif.time}</span>
            </div>
        `;

        notifList.appendChild(li);
    });
}

// Clear Notifications Action
function clearNotifications() {
    mockNotifications.length = 0; // Empty the array
    loadNotifications();
}
