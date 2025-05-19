        // Toggle sidebar on mobile
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('active');
        });
        
        // Simulate loading data
        setTimeout(function() {
            // This would be replaced with actual data loading in a real application
            console.log("Data loaded");
        }, 1000);