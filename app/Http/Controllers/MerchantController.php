<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MerchantController extends Controller
{
    public function dashboard()
    {
        $merchant = Auth::user();

        return view('merchant.dashboard', [
            'merchant' => $merchant,
            'menus' => Menu::where('merchant_id', $merchant->id)->latest()->take(5)->get(),
            'orders' => Order::with(['customer', 'items.menu'])->where('merchant_id', $merchant->id)->latest()->take(5)->get(),
        ]);
    }

    public function profile()
    {
        return view('merchant.profile', ['merchant' => Auth::user()]);
    }

    public function updateProfile(Request $request)
    {
        $validated = $request->validate([
            'company_name' => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:100'],
            'address' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
        ]);

        $merchant = Auth::user();
        $merchant->update($validated);

        return redirect()->route('merchant.profile')->with('success', 'Profil merchant berhasil diperbarui.');
    }

    public function menus()
    {
        $merchant = Auth::user();

        return view('merchant.menus', [
            'merchant' => $merchant,
            'menus' => Menu::where('merchant_id', $merchant->id)->latest()->get(),
        ]);
    }

    public function createMenu()
    {
        return view('merchant.menu-form', ['menu' => null]);
    }

    public function storeMenu(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'category' => ['nullable', 'string', 'max:100'],
            'image_url' => ['nullable', 'url'],
        ]);

        Auth::user()->merchantMenus()->create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'category' => $validated['category'] ?? 'umum',
            'image_url' => $validated['image_url'] ?? 'https://images.unsplash.com/photo-1544025162-d76694265947?auto=format&fit=crop&w=800&q=80',
        ]);

        return redirect()->route('merchant.menus')->with('success', 'Menu berhasil ditambahkan.');
    }

    public function editMenu(Menu $menu)
    {
        abort_if($menu->merchant_id !== Auth::id(), 403);

        return view('merchant.menu-form', ['menu' => $menu]);
    }

    public function updateMenu(Request $request, Menu $menu)
    {
        abort_if($menu->merchant_id !== Auth::id(), 403);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'category' => ['nullable', 'string', 'max:100'],
            'image_url' => ['nullable', 'url'],
        ]);

        $menu->update($validated);

        return redirect()->route('merchant.menus')->with('success', 'Menu berhasil diperbarui.');
    }

    public function deleteMenu(Menu $menu)
    {
        abort_if($menu->merchant_id !== Auth::id(), 403);

        $menu->delete();

        return redirect()->route('merchant.menus')->with('success', 'Menu berhasil dihapus.');
    }

    public function orders()
    {
        $merchant = Auth::user();

        return view('merchant.orders', [
            'merchant' => $merchant,
            'orders' => Order::with(['customer', 'invoice', 'items.menu'])->where('merchant_id', $merchant->id)->latest()->get(),
        ]);
    }

    public function invoice($invoice)
    {
        $invoice = \App\Models\Invoice::with(['order.customer', 'order.items.menu'])->findOrFail($invoice);

        return view('merchant.invoice', ['invoice' => $invoice]);
    }
}
