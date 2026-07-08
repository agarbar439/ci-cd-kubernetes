#!/bin/bash

BASE_URL="http://localhost:8080"

echo "=== Test 1: Health Check ==="

HEALTH=$(curl -s "$BASE_URL/health.php")

if [[ "$HEALTH" == *"ok"* ]]; then
    echo "✅ Health OK"
else
    echo "❌ Health FAILED"
    exit 1
fi

echo ""
echo "=== Test 2: Save Color ==="

SAVE_RESPONSE=$(curl -s \
    -X POST \
    "$BASE_URL/saveColor.php" \
    -H "Content-Type: application/json" \
    -d '{"color":"red"}')

if [[ "$SAVE_RESPONSE" == *"success"* ]]; then
    echo "✅ Save Color OK"
else
    echo "❌ Save Color FAILED"
    echo "$SAVE_RESPONSE"
    exit 1
fi

echo ""
echo "=== Test 3: Get Color ==="

GET_RESPONSE=$(curl -s "$BASE_URL/getColor.php")

if [[ "$GET_RESPONSE" == *"red"* ]]; then
    echo "✅ Get Color OK"
else
    echo "❌ Get Color FAILED"
    echo "$GET_RESPONSE"
    exit 1
fi

echo ""
echo "🎉 TODOS LOS TESTS HAN PASADO"