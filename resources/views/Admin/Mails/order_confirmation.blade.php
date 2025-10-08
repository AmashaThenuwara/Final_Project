<h2>Hi {{ $order->name }},</h2>
<p>Your order (ID: {{ $order->id }}) has been confirmed!</p>

<p><strong>Total:</strong> Rs {{ $order->total }}</p>
<p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>

<p>Thank you for shopping with ADD Clothing!</p>
