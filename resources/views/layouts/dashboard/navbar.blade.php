<div>
    <div>
        <a href="{{ route('dashboard.index') }}" class="{{ (request()->is('dashboard')) ? 'font-bold' : '' }} hover:text-blue-500">
            Dashboard
        </a>
    </div>
    <div>
        <a href="{{ route('dashboard.customers.index') }}" class="{{ (request()->is('dashboard/customers*')) ? 'font-bold' : '' }} hover:text-blue-500">
            Customers
        </a>
        <div class="pl-2.5">
            <a href="{{ route('dashboard.customers.create') }}" class="{{ (request()->is('dashboard/customers/new')) ? 'font-bold' : '' }} hover:text-blue-500">
                New
            </a>
        </div>
    </div>
    <div>
        <a href="{{ route('dashboard.products.index') }}" class="{{ (request()->is('dashboard/products*')) ? 'font-bold' : '' }} hover:text-blue-500">
            Products
        </a>
        <div class="pl-2.5">
            <a href="{{ route('dashboard.products.create') }}" class="{{ (request()->is('dashboard/products/new')) ? 'font-bold' : '' }} hover:text-blue-500">
                New
            </a>
        </div>
    </div>
    <div>
        <a href="{{ route('dashboard.orders.index') }}" class="{{ (request()->is('dashboard/orders*')) ? 'font-bold' : '' }} hover:text-blue-500">
            Orders
        </a>
        <div class="pl-2.5">
            <a href="{{ route('dashboard.orders.create') }}" class="{{ (request()->is('dashboard/orders/new')) ? 'font-bold' : '' }} hover:text-blue-500">
                New
            </a>
        </div>
    </div>
    <div>
        <a href="{{ route('dashboard.expenses.index') }}" class="{{ (request()->is('dashboard/expenses*')) ? 'font-bold' : '' }} hover:text-blue-500">
            Expenses
        </a>
        <div class="pl-2.5">
            <a href="{{ route('dashboard.expenses.create') }}" class="{{ (request()->is('dashboard/expenses/new')) ? 'font-bold' : '' }} hover:text-blue-500">
                New
            </a>
        </div>
    </div>
    <div>
        <a href="{{ route('dashboard.accounting.index') }}" class="{{ (request()->is('dashboard/accounting*')) ? 'font-bold' : '' }} hover:text-blue-500">
            Accounting
        </a>
        <div class="pl-2.5">
            <a href="{{ route('dashboard.accounting.show', 'export') }}" class="{{ (request()->is('dashboard/accounting/export')) ? 'font-bold' : '' }} hover:text-blue-500">
                Export
            </a>
        </div>
        <div class="pl-2.5">
            <a href="{{ route('dashboard.accounting.show', 'incoming') }}" class="{{ (request()->is('dashboard/accounting/incoming')) ? 'font-bold' : '' }} hover:text-blue-500">
                Incoming
            </a>
        </div>
        <div class="pl-2.5">
            <a href="{{ route('dashboard.accounting.show', 'outgoing') }}" class="{{ (request()->is('dashboard/accounting/outgoing')) ? 'font-bold' : '' }} hover:text-blue-500">
                Outgoing
            </a>
        </div>
    </div>
    <div>
        <a href="{{ route('dashboard.calendar.index') }}" class="{{ (request()->is('dashboard/calendar*')) ? 'font-bold' : '' }} hover:text-blue-500">
            Calendar
        </a>
    </div>
</div>
