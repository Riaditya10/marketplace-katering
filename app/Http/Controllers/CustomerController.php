<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function dashboard()
    {
        $customer = Auth::user();
        $merchants = User::where('role', 'merchant')->with('merchantMenus')->latest()->get();

        return view('customer.dashboard', [
            'customer' => $customer,
            'merchants' => $merchants,
        ]);
    }

    public function search(Request $request)
    {
        $query = $request->get('q');
        $category = $request->get('category');

        $menus = Menu::query()->with('merchant');

        if ($query) {
            $menus->where(function ($q) use ($query) {
                $q->where('name', 'like', "%{$query}%")
                    ->orWhere('description', 'like', "%{$query}%");
            });
        }

        if ($category) {
            $menus->where('category', $category);
        }

        return view('customer.search', [
            'menus' => $menus->latest()->get(),
            'query' => $query,
            'category' => $category,
        ]);
    }

    public function catalog(User $merchant)
    {
        abort_if($merchant->role !== 'merchant', 404);

        return view('customer.catalog', [
            'merchant' => $merchant,
            'menus' => $merchant->merchantMenus()->latest()->get(),
        ]);
    }

    public function storeOrder(Request $request)
    {
        $validated = $request->validate([
            'merchant_id' => ['required', 'exists:users,id'],
            'menu_id' => ['required', 'exists:menus,id'],
            'quantity' => ['required', 'integer', 'min:1'],
            'delivery_date' => ['required', 'date'],
            'notes' => ['nullable', 'string'],
        ]);

        $merchant = User::findOrFail($validated['merchant_id']);
        $menu = Menu::findOrFail($validated['menu_id']);

        if ($menu->merchant_id != $merchant->id) {
            return back()->withErrors(['menu_id' => 'Menu tidak sesuai dengan merchant yang dipilih.']);
        }

        $subtotal = $menu->price * $validated['quantity'];
        $order = Order::create([
            'customer_id' => Auth::id(),
            'merchant_id' => $merchant->id,
            'delivery_date' => $validated['delivery_date'],
            'status' => 'pending',
            'notes' => $validated['notes'] ?? null,
            'total_price' => $subtotal,
        ]);

        OrderItem::create([
            'order_id' => $order->id,
            'menu_id' => $menu->id,
            'quantity' => $validated['quantity'],
            'price' => $menu->price,
            'subtotal' => $subtotal,
        ]);

        $invoice = Invoice::create([
            'order_id' => $order->id,
            'invoice_number' => 'INV-' . now()->format('YmdHis') . '-' . $order->id,
            'total' => $subtotal,
            'status' => 'unpaid',
            'due_date' => now()->addDays(7),
        ]);

        return redirect()->route('customer.invoice', $invoice->id)->with('success', 'Pesanan berhasil dibuat dan invoice telah dibuat.');
    }

    public function orders()
    {
        $orders = Order::with(['merchant', 'items.menu', 'invoice'])->where('customer_id', Auth::id())->latest()->get();

        return view('customer.orders', ['orders' => $orders]);
    }

    public function invoice(Invoice $invoice)
    {
        abort_if($invoice->order->customer_id !== Auth::id(), 403);

        return view('customer.invoice', ['invoice' => $invoice->load(['order.merchant', 'order.items.menu'])]);
    }
}
