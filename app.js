// Firebase Configuration (Replace with your actual config)
const firebaseConfig = {const firebaseConfig = {
  apiKey: "AIzaSyDYdTJdXbxZ4bUGW-wO1BRaszEUb2Q_BAg",
  authDomain: "shivearnapp.firebaseapp.com",
  projectId: "shivearnapp",
  storageBucket: "shivearnapp.firebasestorage.app",
  messagingSenderId: "467728812929",
  appId: "1:467728812929:web:a73f12827309d9c09d7680"
}; };
firebase.initializeApp(firebaseConfig);

const auth = firebase.auth();
const database = firebase.database();

// 1. Session Persistence & Auth Check
auth.onAuthStateChanged((user) => {
    if (user) {
        loadUserData(user.uid);
        listenToTasks();
    } else {
        window.location.href = "login.html"; // Redirect if not logged in
    }
});

// 2. Real-time User Data Fetch
function loadUserData(uid) {
    const userRef = database.ref('User/' + uid);
    userRef.on('value', (snapshot) => {
        const data = snapshot.val();
        if (data) {
            document.getElementById('user-name').innerText = data.name;
            document.getElementById('user-pfp').src = data.profilePhoto || 'default-pfp.png';
            document.getElementById('header-coins').innerText = data.coins;
            document.getElementById('stat-total-coins').innerText = data.coins;
            document.getElementById('stat-total-earned').innerText = `$${(data.totalEarned || 0).toFixed(2)}`;
            document.getElementById('stat-ads-today').innerText = data.adsWatchedToday;
            document.getElementById('stat-ref-earn').innerText = data.referralEarnings || 0;

            // Rule: Disable buttons if rewardEnabled is false
            const actionButtons = document.querySelectorAll('.action-btn');
            actionButtons.forEach(btn => {
                btn.disabled = !data.rewardEnabled;
                btn.style.opacity = data.rewardEnabled ? "1" : "0.5";
            });

            // Hide loader, show dashboard
            document.getElementById('app-loader').style.display = 'none';
            document.getElementById('main-content').style.display = 'block';
        }
    });
}

// 3. Real-time Tasks Fetch
function listenToTasks() {
    const tasksRef = database.ref('GameTasks');
    tasksRef.on('value', (snapshot) => {
        const container = document.getElementById('tasks-container');
        container.innerHTML = ''; // Clear current list

        snapshot.forEach((childSnapshot) => {
            const task = childSnapshot.val();
            
            // Rule: If task status is inactive, don't show it
            if (task.status === 'active') {
                const taskHtml = `
                    <div class="task-card">
                        <img src="${task.bannerImage}" class="task-banner">
                        <div class="task-info">
                            <h4>${task.gameName}</h4>
                            <p>${task.taskName}</p>
                            <span class="reward-tag">+${task.rewardCoins} Coins</span>
                        </div>
                        <button class="start-btn" onclick="startTask('${childSnapshot.key}')">Start</button>
                    </div>
                `;
                container.innerHTML += taskHtml;
            }
        });
    });
}

function startTask(taskId) {
    console.log("Starting task:", taskId);
    // Add logic for redirection or ad triggers here
}