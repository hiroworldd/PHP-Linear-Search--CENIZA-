<?php
// Function: linearSearch
// Performs a manual linear search through $array for $target.
// Returns the index 0-based of the first match, or -1 if not found.
// Comparison uses loose equality == so numeric strings and numbers match sensibly.
function linearSearch($array, $target) {
    // Iterate through every element
    for ($i = 0; $i < count($array); $i++) {
        // If current element equals the target, return index
        if ($array[$i] == $target) {
            return $i;
        }
    }
    // If loop completes with no match, return -1
    return -1;
}

// Predefined array with at least 10 elements
$items = [
    "apple",
    "banana",
    "cherry",
    25,
    "grape",
    "orange",
    42,
    "mango",
    "kiwi",
    "pear",
    "strawberry",
    "100"
];

// Handle form submission
$searchTarget = "";
$foundIndex = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $searchTarget = isset($_POST['target']) ? trim($_POST['target']) : '';
    $foundIndex = linearSearch($items, $searchTarget);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Linear Search Demo</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    :root{
        --secondary-bg: #eef2f6; 
        --secondary-accent: #6c757d; 
        --card-bg: #ffffff;
        --muted-text: #6b7280;
        --accent-btn: #6c757d;
        font-family: Inter, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
    }
    body { background: var(--secondary-bg); color: #222; }
    .card { background: var(--card-bg); border: none; border-radius: 12px; box-shadow: 0 6px 18px rgba(99,102,241,0.06); }
    .btn-secondary { background: var(--accent-btn); border: none; box-shadow: none; }
    .form-control:focus { box-shadow: 0 0 0 0.15rem rgba(108,117,125,0.15); border-color: #6c757d; }
    .tag { font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, "Roboto Mono", monospace; background: #f8fafc; padding: 0.25rem 0.5rem; border-radius: 6px; }
    .result-found { color: #155724; background: #d4edda; padding: 0.5rem; border-radius: 6px; }
    .result-notfound { color: #721c24; background: #f8d7da; padding: 0.5rem; border-radius: 6px; }
    .small-muted { color: var(--muted-text); font-size: 0.9rem; }
</style>
</head>
<body>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-9 col-lg-7">
            <div class="card p-4">
                <h3 class="mb-2" style="color:var(--secondary-accent)">Linear Search</h3>

                <form method="post" class="row g-3 align-items-end">
                    <div class="col-md-8">
                        <label class="form-label">Value to search</label>
                        <input type="text" name="target" class="form-control" value="<?php echo htmlspecialchars($searchTarget); ?>" required>
                    </div>
                    <div class="col-md-4 d-grid">
                        <button type="submit" class="btn btn-secondary">Search</button>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Array sample</label>
                        <div class="p-3" style="background:#fbfcfd;border-radius:8px;border:1px solid #eef2f6;">
                            <span class="tag">[<?php echo implode(', ', array_map(function($v){ return is_string($v) ? "'".$v."'" : $v; }, $items)); ?>]</span>
                        </div>
                    </div>
                </form>

                <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
                    <hr class="my-4">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="card p-3">
                                <h6 class="mb-2 small-muted">Search Input</h6>
                                <p class="mb-0"><?php echo htmlspecialchars($searchTarget); ?></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card p-3">
                                <h6 class="mb-2 small-muted">Result</h6>
                                <?php if ($foundIndex !== -1): ?>
                                    <div class="result-found">
                                        <?php echo htmlspecialchars($searchTarget); ?> found at index <?php echo $foundIndex; ?>.
                                    </div>
                                <?php else: ?>
                                    <div class="result-notfound">
                                        <?php echo htmlspecialchars($searchTarget); ?> not found.
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
